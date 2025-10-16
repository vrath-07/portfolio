<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | My Portfolio</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
            color: #333;
            overflow-x: hidden;
        }

        .contact-container {
            padding: 80px 0;
        }

        .contact-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }

        .contact-header {
            font-weight: 700;
            color: #d62828;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .contact-info p {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .contact-info a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        @media (max-width: 768px) {
            .contact-card {
                padding: 25px;
            }

            iframe {
                height: 300px;
            }
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <x-header />

    <div class="container contact-container">
        <div class="row align-items-center gy-5">
            <!-- Map -->
            <div class="col-lg-6" data-aos="fade-right">
                <iframe 
                    src="https://www.google.com/maps?q=Department%20of%20Design%2C%20IIT%20Guwahati&output=embed"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>

            <!-- Info -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="contact-card">
                    <h4 class="contact-header mb-3">Dr. Debayan Dhar</h4>
                    <div class="contact-info">
                        <p>Associate Professor, Department of Design</p>
                        <p>Indian Institute of Technology Guwahati</p>
                        <p>Assam, 781039</p>
                        <br>
                        <p><strong>Email:</strong> <a href="mailto:debayan@iitg.ac.in">debayan@iitg.ac.in</a></p>
                        <p><strong>Phone (Office):</strong> +91 361 258 2483</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer (optional if using layout) --}}
    <x-footer />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
