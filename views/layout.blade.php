<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-Zm0c6nUD+gI4xXr+AJKxvN4gZMGH2l7f+eFGOd9l6D8eL0yY2kU7dXkU1iXoNmIQ+FqHfH2VtZlY3bPp/0iQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>My Academy - @yield('title')</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary sticky-top">
        <div class="container-fluid">
            <h1 class="display-5 ml-0 text-white">My Academy</h1><br>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-bold">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('course.index') }}">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('mentor.index') }}">Mentors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('contact') }}">Contact</a>
                    </li>
                    @if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
                    <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                </ul>

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                    @auth

                        <li class="nav-item">

                            <form method="POST" action="{{ route('logout') }}" class="d-flex">
                                @csrf
                                <button type="submit" class="nav-link text-white" style="background: none; border: none; padding: 0.5rem 1rem;">
                                    Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="container mt-4">
        @yield('content')
    </main>
 
    <footer class="bg-dark text-white text-center text-lg-start mt-auto sticky-end ">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">My Academy</h5>
                    <p>"Learning never exhausts the mind"</p>
                </div>
 
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Quick Links</h5>
                    <i class="bi bi-instagram mx-1"></i>
                    <i class="bi bi-whatsapp mx-1"></i>
                    <i class="bi bi-facebook mx-1"></i>
                    <i class="bi bi-telephone-inbound mx-1"></i>
                    <i class="bi bi-envelope-fill mx-1"></i>
                    <i class="bi bi-telegram mx-1"></i>
                </div>
 
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class="list-unstyled mb-0">
                        <li>Email: ets@gmail.com</li>
                        <li>Phone: 9876543210</li>
                        <li>Location: India</li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Any Doubt</h5>
                    <form action="#" method="POST">
                        <textarea name="message" placeholder="Enter your query" required class="form-control mb-2"></textarea><br>
                        <button type="submit" class="btn btn-success">Send</button>
                    </form>
                </div>
            </div>
        </div>
 
        <div class="text-center p-3 bg-secondary">
            © {{ date('Y') }} My Laravel App | All rights reserved
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-suxF/y4iG7v/D/S7L2fT4G5F+3n5O5s0lG9d8m7V5t5m5M9C6V1t9Z5Ff9V5t5h" crossorigin="anonymous"></script>
</body>
</html>