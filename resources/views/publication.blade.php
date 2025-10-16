<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Publications | My Portfolio</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
            color: #333;
            overflow-x: hidden;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-weight: 700;
            color: #d62828;
            font-size: 2.4rem;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            width: 60%;
            height: 3px;
            background: #d62828;
            transform: translateX(-50%);
            border-radius: 3px;
        }

        .pub-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 1.8rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            border-left: 5px solid transparent;
            position: relative;
        }

        .pub-card:hover {
            transform: translateY(-6px);
            border-left-color: #d62828;
            background: linear-gradient(145deg, #ffffff, #fff5f5);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .pub-title a {
            text-decoration: none;
            color: #000;
            font-weight: 600;
            font-size: 1.15rem;
            line-height: 1.4;
            transition: color 0.3s;
        }

        .pub-title a:hover {
            color: #d62828;
        }

        .pub-authors {
            color: #444;
            font-size: 0.95rem;
            margin-top: 6px;
        }

        .pub-year {
            font-weight: 600;
            font-size: 0.9rem;
            color: #666;
        }

        .pub-link a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .pub-link a:hover {
            text-decoration: underline;
            color: #0a58ca;
        }

        .year-group {
            margin-bottom: 3rem;
        }

        .year-heading {
            font-size: 1.6rem;
            font-weight: 600;
            color: #222;
            margin-bottom: 1.3rem;
            border-bottom: 2px solid #eee;
            padding-bottom: .5rem;
        }

        .pub-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: .75rem;
        }

        .copy-btn {
            border: none;
            background: none;
            color: #999;
            cursor: pointer;
            transition: color 0.3s;
        }

        .copy-btn:hover {
            color: #d62828;
        }

        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #222;
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.3s ease;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .pub-title a { font-size: 1rem; }
            .pub-meta { flex-direction: column; align-items: flex-start; gap: .5rem; }
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <x-header />

    @php use Illuminate\Support\Str; @endphp

    <div class="container py-5">
        <div class="section-header" data-aos="fade-down">
            <h2>Research Publications</h2>
            <p class="text-muted mt-3">Curated for your convienice from Google Scholar</p>
        </div>

        @if($publications->isEmpty())
            <p class="text-center text-muted" data-aos="fade-up">
                No publications found. Please check back later.
            </p>
        @else
            @php
                $grouped = $publications->groupBy('year')->sortKeysDesc();
            @endphp

            <div class="row justify-content-center">
                <div class="col-lg-9">

                    @foreach($grouped as $year => $pubs)
    <div class="year-group" data-aos="fade-up">
        <div class="year-heading">{{ $year ?? 'Undated' }}</div>

        @foreach($pubs as $pub)
            @php
                $link = trim($pub->link ?? '');

                // ✅ Force correct scholar URLs regardless of missing slash
                if (!Str::startsWith($link, 'http')) {
                    // Add leading slash if missing
                    if (!Str::startsWith($link, '/')) {
                        $link = '/' . $link;
                    }
                    $link = 'https://scholar.google.com' . $link;
                }

                // ✅ Fallback safeguard
                if (!Str::startsWith($link, 'https://scholar.google.com')) {
                    $link = 'https://scholar.google.com';
                }
            @endphp

            <div class="pub-card">
                <div class="pub-title">
                    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer">
                        {{ $pub->title }}
                    </a>
                </div>
                <div class="pub-authors">{{ $pub->authors }}</div>
                <div class="pub-meta">
                    <div class="pub-year">
                        <i class="bi bi-calendar3"></i> {{ $pub->year ?? 'N/A' }}
                    </div>
                    {{-- <div class="pub-link d-flex align-items-center gap-2">
                        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer">
                            View on Google Scholar →
                        </a>
                        <button class="copy-btn" onclick="copyToClipboard('{{ $link }}')">
                            <i class="bi bi-clipboard"></i>
                        </button>
                    </div> --}}
                </div>
            </div>
        @endforeach
    </div>
@endforeach


                </div>
            </div>
        @endif
    </div>

    <div id="toast" class="toast">Link copied to clipboard!</div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 900, easing: 'ease-in-out', once: true });

        function copyToClipboard(link) {
            navigator.clipboard.writeText(link).then(() => {
                const toast = document.getElementById('toast');
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 2000);
            });
        }
    </script>
</body>
</html>
