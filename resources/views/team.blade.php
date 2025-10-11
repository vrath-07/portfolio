<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team | My Portfolio</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fff;
            color: #333;
            overflow-x: hidden;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        h1, h2 {
            font-weight: 600;
        }
        .section-title {
            color: #d62828;
            font-weight: 600;
            margin-bottom: 2rem;
        }
        .scholar-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            transition: all 0.3s ease;
        }
        .scholar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .scholar-img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .scholar-info h4 {
            color: #000;
            font-weight: 600;
            margin-bottom: .3rem;
        }
        .scholar-info a {
            color: #0d6efd;
            text-decoration: underline;
        }
        .scholar-info a:hover {
            color: #084298;
        }
    </style>
</head>
<body>

    {{-- Include Header --}}
    <x-header />

    <div class="container py-5">
        <h1 class="section-title text-center" data-aos="fade-up">Our Team</h1>

        @foreach($members as $role => $group)
            <h2 class="mt-5 mb-4 text-center" data-aos="fade-up">{{ $role }}</h2>

            <div class="d-flex flex-column gap-4">
                @foreach($group as $member)
                    <div class="scholar-card flex-md-row align-items-start gap-4" data-aos="fade-up">
                        <img src="{{ $member->image ? asset('storage/' . $member->image) : asset('assets/default-avatar.png') }}" 
                             alt="{{ $member->name }}" 
                             class="scholar-img">
                        <div class="scholar-info">
                            <h4>{{ $member->name }}</h4>
                            <p><strong>Status:</strong> {{ $member->status ?? 'N/A' }}</p>
                            @if($member->thesis_title)
                                <p><strong>Thesis Title:</strong> {{ $member->thesis_title }}</p>
                            @endif
                            @if($member->area_of_research)
                                <p><strong>Area of Research:</strong> {{ $member->area_of_research }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
    </script>
</body>
</html>
