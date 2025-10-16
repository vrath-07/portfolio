<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        nav.navbar { background-color: #343a40; }
        nav.navbar a { color: #fff !important; margin-right: 15px; }
    </style>
</head>
<body>
    {{-- Admin navigation --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="{{ route('admin.courses.index') }}">Admin Panel</a>
            <div>
                <a href="{{ route('admin.courses.index') }}" class="nav-link d-inline text-white">Courses</a>
                <a href="{{ route('admin.team.index') }}" class="nav-link d-inline text-white">Team</a>
                <a href="{{ route('admin.publications.index') }}" class="nav-link d-inline text-white">Publications</a>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="nav-link d-inline text-white">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
