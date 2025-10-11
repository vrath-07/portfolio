<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me | My Portfolio</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
            color: #333;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-weight: 600;
        }

        a {
            color: #d62828;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        a:hover {
            color: #b51717;
            text-decoration: underline;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .profile-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 35px rgba(0,0,0,0.12);
        }

        .profile-img {
            width: 100%;
            max-width: 320px;
            border-radius: 8px;
            border-bottom: 5px solid #d62828;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .section-divider {
            border-top: 2px solid #f1c40f;
            width: 80px;
            margin: 1rem 0;
        }

        .section-title {
            color: #d62828;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .content-section {
            margin-top: 3rem;
            background-color: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .highlight {
            color: #d62828;
            font-weight: 500;
        }

        ul {
            padding-left: 1.2rem;
            margin-bottom: 0;
        }

        li {
            margin-bottom: .6rem;
        }

        .social-icons a {
            font-size: 1.4rem;
            color: #555;
            margin: 0 8px;
        }

        .social-icons a:hover {
            color: #007bff;
        }

        .interest-area span {
            color: #d62828;
            font-weight: 600;
        }
        .orcid-icon{
            height: 29px;
        }
    </style>
</head>
<body>

    {{-- Include Header --}}
    <x-header />

    <div class="container py-5">
        <div class="row justify-content-center align-items-start">
            <!-- Profile Column -->
            <div class="col-md-4" data-aos="fade-right">
                <div class="profile-card">
                    <img src="{{ asset('assets/profile.jpg') }}" alt="Profile Photo" class="profile-img mb-3">
                    <div class="social-icons">
                        <a href="https://scholar.google.com/citations?user=WyPdYdQAAAAJ&hl=en&oi=ao"><i class="bi bi-google"></i></a>
                        <a href="https://www.linkedin.com/in/debayan-dhar/"><i class="bi bi-linkedin"></i></a>
                        <a href="https://orcid.org/0000-0003-0778-8171" target="_blank" title="ORCID"> <img src="{{ asset('assets/orcid.png') }}" alt="ORCID" class="orcid-icon"></a>
                    </div>
                </div>
            </div>

            <!-- Info Column -->
            <div class="col-md-8" data-aos="fade-left">
                <h1 class="text-danger fw-bold">Dr. Debayan Dhar</h1>
                <h5 class="text-secondary mb-4">Associate Professor, Department of Design</h5>
                <p>
                    I am Debayan Dhar, a Design educator with a decade-long journey shaping the minds of future designers. My teaching ethos integrates ethnographic studies and smart technologies to confront societal challenges effectively.
                </p>
                <p>
                    I foster critical thinking, diverse perspectives exploration, and boundaries-pushing design approaches in every course and project. I empower students to craft products and experiences addressing real-world issues by imparting a profound grasp of human behaviour and needs.

Join me in exploring the dynamic intersection of Design and Technology, where boundless creativity flourishes and innovation thrives. Let's embark together on a journey of discovery, where challenges become opportunities to shape impactful solutions.
                </p>
                <p class="interest-area">
                    <span>Areas of Interest:</span> User Experience Design, Interaction Design, Creativity and Innovation, Design Methods and Tools, Information Design, Design Education, Design History.
                </p>
                <div class="section-divider"></div>
            </div>
        </div>

        <!-- Education -->
        <div class="content-section" data-aos="fade-up">
            <h5 class="section-title">Educational Details</h5>
            <ul>
                <li>Ph.D. – Design, <a href="https://www.iitg.ac.in/">Indian Institute of Technology Guwahati</a>, Supervisor: <a href="https://www.linkedin.com/in/pradeep-yammiyavar-3052252/"> Prof. Pradeep Yammiyavar.</a></li>
                <li>M.Des – Design, <a href="https://www.iitg.ac.in/">Indian Institute of Technology Guwahati</a></li>
                <li>B.Tech – <a href="https://nerist.ac.in/">North Eastern Regional Institute of Science and Technology,</a> Arunachal Pradesh.</li>
            </ul>
        </div>

        <!-- Awards -->
        <div class="content-section" data-aos="fade-up" data-aos-delay="100">
            <h5 class="section-title">Awards</h5>
            <ul>
                <li>Fulbright – Nehru Doctoral Fellowship 2012-13 at the University of Texas at Austin, Supervisor: <a href="https://gosling.psy.utexas.edu/people/sam-gosling/">Prof. Sam Gosling</a></li>
                <li><a href ="https://brics-ysf.org/content/Durban/participants">BRICS Young Scientist 2018,</a> DST Govt. of India.</li>
            </ul>
        </div>

        <!-- Employment -->
        <div class="content-section mb-5" data-aos="fade-up" data-aos-delay="200">
            <h5 class="section-title">Employment Details</h5>
            <ul>
                <li>Associate Professor, Department of Design, IIT Guwahati - 2023 onwards.</li>
                <li>Assistant Professor, Department of Design, IIT Guwahati – 2017 to 2023.</li>
                <li>Head and Associate Professor, Department of User Experience Design, MIT Institute of Design, MIT ADT University, Pune – 2014 to 2017.</li>
                <li>Assistant Project Engineer, CET IIT Guwahati – 2014.</li>
                <li>User Experience Analyst, Estuary Labs, Mumbai - 2009.</li>
            </ul>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>
