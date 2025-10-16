<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | My Portfolio</title>

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
            font-size: 2.2rem;
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

        .project-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        .project-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .project-body {
            padding: 1.5rem;
            flex-grow: 1;
        }

        .project-body h5 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #000;
        }

        .project-body p {
            color: #555;
            font-size: 0.95rem;
            margin-bottom: 0.8rem;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 0.8rem;
        }

        .tech-tag {
            background: #f1f1f1;
            color: #555;
            font-size: 0.8rem;
            border-radius: 50px;
            padding: 3px 10px;
        }

        .project-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1.5rem 1rem;
        }

        .project-footer .year {
            font-weight: 600;
            color: #666;
        }

        .btn-view {
            background: #d62828;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            background: #b31e1e;
            color: #fff;
        }

        @media (max-width: 768px) {
            .project-card img {
                height: 160px;
            }
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <x-header />

    <div class="container py-5">
        <div class="section-header" data-aos="fade-down">
            <h2>Projects</h2>
            <p class="text-muted mt-3">A showcase of selected academic and professional works.</p>
        </div>

        @if($projects->isEmpty())
            <p class="text-center text-muted" data-aos="fade-up">
                No projects available yet. Please check back later.
            </p>
        @else
            <div class="row g-4 justify-content-center">
                @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="project-card">
                            @if($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
                            @else
                                <img src="https://via.placeholder.com/400x200?text=Project+Image" alt="Placeholder">
                            @endif

                            <div class="project-body">
                                <h5>{{ $project->title }}</h5>
                                <p>{{ Str::limit($project->description, 100) }}</p>

                                @if($project->technologies)
                                    <div class="project-tech">
                                        @foreach(explode(',', $project->technologies) as $tech)
                                            <span class="tech-tag">{{ trim($tech) }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="project-footer">
                                <div class="year"><i class="bi bi-calendar3"></i> {{ $project->year ?? '—' }}</div>
                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer" class="btn-view">
                                        View
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 900, easing: 'ease-in-out', once: true });
    </script>
</body>
</html>
