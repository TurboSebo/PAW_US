<!DOCTYPE HTML>
<!--
    Dopetrope by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Cybercentrum - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>
<body class="is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <section id="header">
            <!-- Logo -->
            <h1><a href="{{ url('/') }}">Cybercentrum</a></h1>
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('posts.index') }}">Posty</a></li>
                    <li><a href="{{ route('user.profile', ['id' => Auth::user()->id_uzytkownika]) }}">Mój profil</a></li>
                    <li><a href="{{ route('user.index') }}">Użytkownicy</a></li>
                    <li><a href="{{ route('logout') }}">Wyloguj się</a></li>
                </ul>
            </nav>
        </section>

        <!-- Main -->
        <section id="main">
            <div class="container">
                <header>
                    <h2>Witaj, {{ Auth::user()->nazwa_uzytkownika }} na stronie Dashboard!</h2>
                </header>
                <p>Jesteś zalogowany!</p><br/>
                <ul>
                    <li><a href="{{ route('posts.index') }}">Posty</a></li>
                    <li><a href="{{ route('user.profile', ['id' => Auth::user()->id_uzytkownika]) }}">Mój profil</a></li>
                    <li><a href="{{ route('user.index') }}">Użytkownicy</a></li>
                </ul>
                <a href="{{ route('logout') }}" class="button">Wyloguj się</a>
            </div>
        </section>

        <!-- Footer -->
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="actions">
                        <li>&copy; Cybercentrum. All rights reserved.</li>
                            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
