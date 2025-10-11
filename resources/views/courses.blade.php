<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses | Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fafafa;
        }

        .hero-section {
            background: linear-gradient(90deg, #f44336 0%, #ff9800 100%);
            color: white;
            padding: 90px 0 70px;
            text-align: center;
        }

        .hero-section h1 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        .hero-section p {
            font-size: 1.1rem;
            margin-top: 10px;
            opacity: 0.9;
        }

        .section-line {
            width: 80px;
            height: 4px;
            background-color: #f9b234;
            margin: 10px auto 40px;
            border-radius: 10px;
        }

        .course-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease-in-out;
            border: none;
            padding: 25px;
            margin-bottom: 30px;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.12);
        }

        .course-title {
            color: #e53935;
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .course-desc {
            color: #555;
            font-size: 0.95rem;
        }

        iframe {
            width: 100%;
            height: 320px;
            border-radius: 10px;
            border: none;
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    {{-- Header --}}
    @include('components.header')

    {{-- Hero Section --}}
    <section class="hero-section" data-aos="fade-down">
        <div class="container">
            <h1>Courses Offered at IIT Guwahati</h1>
            <p>Explore the specialized courses that shape design thinking and innovation.</p>
        </div>
    </section>

    <div class="container my-5">

        {{-- Regular Courses Section --}}
        <section class="normal-courses mb-5">
            <div class="section-line" data-aos="fade-up"></div>
            <h2 class="mb-4 text-center" data-aos="fade-left">Regular Courses</h2>

            @if($normalCourses->isEmpty())
                <p class="text-muted text-center" data-aos="fade-up">No regular courses available right now.</p>
            @else
                <div class="row">
                    @foreach($normalCourses as $index => $course)
                        <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="course-card">
                                <div class="course-title">{{ $index + 1 }}) {{ $course->title }}</div>
                                <p class="course-desc">{{ $course->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

                {{-- Video Courses Section --}}
        <section class="video-section mb-5">
            <div class="section-line" data-aos="fade-up"></div>
            <h2 class="mb-4 text-center" data-aos="fade-right"> Online Courses</h2>

            @if($videoCourses->isEmpty())
                <p class="text-muted text-center" data-aos="fade-up">No video courses available right now.</p>
            @else
                @foreach($videoCourses as $course)
                    <div class="row align-items-center mb-5" data-aos="fade-up">
                        <div class="col-md-6">
                            <iframe src="{{ $course->video_url }}" allowfullscreen></iframe>
                            {{-- <iframe src="{{ $course->video_url }}" allowfullscreen></iframe> --}}
                            {{-- <iframe src="{{ str_replace('watch?v=', 'embed/', $course->video_url) }}" width="100%" height="315" frameborder="0" allowfullscreen> </iframe> --}}
                        </div>
                        <div class="col-md-6">
                            <h4 class="course-title">{{ $course->title }}</h4>
                            <p class="course-desc">{{ $course->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
    </script>
</body>
</html>
