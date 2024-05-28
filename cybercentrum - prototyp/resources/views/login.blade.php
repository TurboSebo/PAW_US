<!DOCTYPE HTML>
<!--
    Dopetrope by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
    <head>
        <title>Cybercentrum - Logowanie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
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
                        <li><a href="{{ route('register') }}">Rejestracja</a></li>
                    </ul>
                </nav>
            </section>

            <!-- Main -->
            <section id="main">
                <div class="container">
                    <header>
                        <h2>Logowanie</h2>
                    </header>
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-mobile">
                                        <label for="login">Login</label>
                                        <input type="text" id="login" name="nazwa_uzytkownika" required>
                                    </div>
                                    <div class="col-6 col-12-mobile">
                                        <label for="pass">Hasło</label>
                                        <input type="password" name="haslo" id="pass" required>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" value="Zaloguj się" class="primary"></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <p>Nie masz konta? <a href="{{ route('register') }}">Zarejestruj się za darmo</a></p>
                            <p><a href="{{ url('/') }}">Powrót do strony głównej</a></p>

                            @if (session('user_input'))
                                <div class="box">
                                    <strong>Dane wprowadzone przez użytkownika:</strong>
                                    <p>Login: {{ session('user_input')['nazwa_uzytkownika'] }}</p>
                                    <p>Hasło: {{ session('user_input')['haslo'] }}</p>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="box">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @php
                            /*
                                session_start();
                                if (isset($_SESSION['user_data'])) {
                                    echo '<br/><br/>User info<br/>';
                                    $dane_logowania = $_SESSION['user_data'];
                                    print_r($dane_logowania);
                                    session_destroy();
                                }
                                */
                            @endphp
                        </div>
                    </div>
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
