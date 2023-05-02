<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container">
        <ul class="nav nav-underline">
            <li class="nav-item dropdown">
                <a class="nav-link navbar-brand dropdown-toggle"
                   data-bs-toggle="dropdown"
                   aria-expanded="false"
                   href="#">
                    Categories
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/list-categories">
                            List Categories
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/create-category">
                            Create Categories
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link navbar-brand dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    href="#">
                    Tags
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/list-tags">
                            List Tags
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/create-tag">
                            Create Tags
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link navbar-brand dropdown-toggle"
                   data-bs-toggle="dropdown"
                   aria-expanded="false"
                   href="#">
                    Posts
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/">
                            List Posts
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/create-post">
                            Create Posts
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>