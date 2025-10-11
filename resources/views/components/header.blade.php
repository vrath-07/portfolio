<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">My Portfolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">About Me</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/courses') }}">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/team') }}">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/publication') }}">Publications</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/projects') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact Me</a></li>
            </ul>
        </div>
    </div>
</nav>
