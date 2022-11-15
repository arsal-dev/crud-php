<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App</title>
</head>
<body>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">about</a></li>
            <li><a href="#">blog</a></li>
            <li><a href="#">contact</a></li>
        </ul>
    </nav>

    @yield('content')

    <footer>copyright all rights reserved</footer>
</body>
</html>