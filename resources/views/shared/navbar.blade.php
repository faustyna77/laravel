<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoja Marka</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #f8f9fa;
        }
        .navbar .navbar-brand {
            font-weight: bold;
        }
        .navbar .nav-link {
            color: #007bff;
        }
        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #0056b3;
            font-weight: bold;
        }
        .navbar .nav-link.btn {
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            color: #007bff;
        }
        .navbar .nav-link.btn:hover {
            color: #0056b3;
        }
        .navbar .btn-link {
            color: #007bff;
            text-decoration: underline;
        }
        .navbar .btn-link:hover {
            color: #0056b3;
        }
        .navbar-toggler {
            border: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Twoja Marka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'students')) active @endif" href="{{ route('students.index') }}">Studenci</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'courses')) active @endif" href="{{ route('courses.index') }}">Kierunki</a>
                </li>
            </ul>
            <ul id="navbar-user" class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item pr-5">
                    <button class="nav-link btn" onclick="themeToggle()"><i class="bi bi-moon-stars"></i> zmień motyw</button>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="display:inline; padding: 0;">Wyloguj się...</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Zarejestruj się...</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    function themeToggle() {
        // Implementacja funkcji zmiany motywu
        document.body.classList.toggle('dark-mode');
    }
</script>
</body>
</html>
