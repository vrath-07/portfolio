@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-center text-primary">
        <i class="bi bi-journal-text me-2"></i> Google Scholar Publications
    </h2>

    <div class="text-center mb-4">
        <p class="text-muted">
            Fetching publications for <strong>Google Scholar ID:</strong> <code>WyPdYdQAAAAJ</code>
        </p>
        <div class="d-flex justify-content-center gap-3">
            <button id="fetchBtn" class="btn btn-lg btn-outline-primary">
                <i class="bi bi-cloud-download me-1"></i> Fetch Publications
            </button>
            <button id="saveBtn" class="btn btn-lg btn-success" style="display:none;">
                <i class="bi bi-save me-1"></i> Save to Server
            </button>
        </div>
    </div>

    <div id="status" class="text-center mb-3"></div>
    <div id="results" class="mt-4"></div>
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<script>
let publications = [];

document.getElementById("fetchBtn").addEventListener("click", async () => {
    const scholarId = "WyPdYdQAAAAJ"; // your professor’s Scholar ID
    const baseURL = `https://scholar.google.com/citations?user=${scholarId}&hl=en`;
    const proxy = "https://api.codetabs.com/v1/proxy?quest=";

    const resultsDiv = document.getElementById("results");
    const statusDiv = document.getElementById("status");
    const fetchBtn = document.getElementById("fetchBtn");

    fetchBtn.disabled = true;
    fetchBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span> Fetching...`;
    resultsDiv.innerHTML = "";
    statusDiv.innerHTML = "";
    publications = [];

    let cstart = 0;
    const pagesize = 20;

    try {
        while (true) {
            const pageURL = `${baseURL}&cstart=${cstart}&pagesize=${pagesize}`;
            const apiURL = `${proxy}${encodeURIComponent(pageURL)}`;
            console.log("Fetching:", pageURL);

            const res = await fetch(apiURL);
            const html = await res.text();

            const parser = new DOMParser();
            const doc = parser.parseFromString(html, "text/html");
            const rows = doc.querySelectorAll(".gsc_a_tr");
            if (!rows.length) break;

            const pagePubs = Array.from(rows).map(row => {
                const href = row.querySelector(".gsc_a_at")?.getAttribute("href") || "";
                const cleanLink = href.startsWith("http")
                    ? href
                    : `https://scholar.google.com${href.startsWith("/") ? "" : "/"}${href}`;

                return {
                    title: row.querySelector(".gsc_a_at")?.innerText || "Untitled",
                    link: cleanLink,
                    authors: row.querySelector(".gsc_a_at + .gs_gray")?.innerText || "",
                    year: row.querySelector(".gsc_a_y span")?.innerText || ""
                };
            });

            publications.push(...pagePubs);
            if (rows.length < pagesize) break;
            cstart += pagesize;
            if (cstart > 200) break;
        }

        fetchBtn.disabled = false;
        fetchBtn.innerHTML = `<i class="bi bi-cloud-download me-1"></i> Fetch Publications`;

        if (!publications.length) {
            resultsDiv.innerHTML = `
                <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    No publications found or Google blocked the request.
                </div>`;
            return;
        }

        // Deduplicate by title
        const unique = [];
        const seen = new Set();
        for (const pub of publications) {
            if (!seen.has(pub.title)) {
                unique.push(pub);
                seen.add(pub.title);
            }
        }
        publications = unique;

        // Display pretty list
        let htmlOutput = `
            <div class="alert alert-success text-center">
                <i class="bi bi-check-circle me-1"></i>
                Fetched <strong>${publications.length}</strong> publications successfully.
            </div>
            <div class="list-group shadow-sm">`;

        publications.forEach(pub => {
            htmlOutput += `
                <a href="${pub.link}" target="_blank" 
                   class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 fw-semibold text-primary">${pub.title}</h5>
                        <small class="text-muted">${pub.year || "N/A"}</small>
                    </div>
                    <p class="mb-1 text-secondary">${pub.authors}</p>
                    <small><i class="bi bi-box-arrow-up-right me-1"></i>View on Google Scholar</small>
                </a>`;
        });

        htmlOutput += `</div>`;
        resultsDiv.innerHTML = htmlOutput;
        document.getElementById("saveBtn").style.display = "inline-block";

    } catch (err) {
        console.error("Fetch error:", err);
        resultsDiv.innerHTML = `
            <div class="alert alert-danger">
                <i class="bi bi-x-circle me-1"></i> Failed to fetch data. Please try again later.
            </div>`;
        fetchBtn.disabled = false;
        fetchBtn.innerHTML = `<i class="bi bi-cloud-download me-1"></i> Fetch Publications`;
    }
});

document.getElementById("saveBtn").addEventListener("click", async () => {
    if (!publications.length) return alert("No publications to save.");

    const saveBtn = document.getElementById("saveBtn");
    saveBtn.disabled = true;
    saveBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span> Saving...`;

    try {
        const res = await fetch("{{ route('admin.publications.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ publications })
        });

        const result = await res.json();
        alert(result.message || "Publications saved successfully!");

    } catch (err) {
        console.error("Save error:", err);
        alert("Failed to save publications to server.");
    } finally {
        saveBtn.disabled = false;
        saveBtn.innerHTML = `<i class="bi bi-save me-1"></i> Save to Server`;
    }
});
</script>
@endsection
