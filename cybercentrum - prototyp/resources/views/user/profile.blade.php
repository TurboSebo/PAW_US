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
    <title>Cybercentrum - Profil użytkownika</title>
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
                    <li><a href="{{ Auth::check() ? route('user.profile', ['id' => Auth::user()->id_uzytkownika]) : route('login') }}">Mój profil</a></li>
                    <li><a href="{{ route('user.index') }}">Użytkownicy</a></li>
                    <li><a href="{{ route('logout') }}">Wyloguj się</a></li>
                </ul>
            </nav>
        </section>

        <!-- Main -->
        <section id="main">
            <div class="container">
                <header>
                    <h2>Profil użytkownika</h2>
                </header>
                <p><strong>Nick:</strong> {{ $user->nazwa_uzytkownika }}</p>
                <p><strong>Rola:</strong> 
                    @if ($user->rola == 1)
                        Administrator
                    @elseif ($user->rola == 2)
                        Moderator
                    @else
                        Użytkownik
                    @endif
                </p>
                @if ($isOwner)
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                @endif
                <p><strong>O mnie:</strong> {{ $user->o_mnie }}</p>

                @if ($isOwner)
                    <h3>Edytuj informacje o sobie</h3>
                    <form method="POST" action="{{ route('user.update', ['id' => $user->id_uzytkownika]) }}">
                        @csrf
                        <label for="about">O mnie:</label><br/>
                        <textarea id="about" name="about" rows="4" cols="50">{{ $user->o_mnie }}</textarea><br/>
                        <input type="submit" value="Zapisz">
                    </form>
                    @if (session('status'))
                        <p>{{ session('status') }}</p>
                    @endif
                @endif

                @if (Auth::check() && (Auth::user()->rola == 1 || Auth::user()->rola == 2) && !$isOwner)
                    @if ($user->konto_aktywne)
                        <form method="POST" action="{{ route('user.ban', ['id' => $user->id_uzytkownika]) }}">
                            @csrf
                            <input type="submit" value="Zbanuj użytkownika">
                        </form>
                    @else
                        <form method="POST" action="{{ route('user.unban', ['id' => $user->id_uzytkownika]) }}">
                            @csrf
                            <input type="submit" value="Odbanuj użytkownika">
                        </form>
                    @endif
                @endif

                @if (Auth::check() && Auth::user()->rola == 1 && !$isOwner)
                    @if ($user->rola == 2)
                        <form method="POST" action="{{ route('user.demote', ['id' => $user->id_uzytkownika]) }}">
                            @csrf
                            <input type="submit" value="Zdegraduj użytkownika z moderatora">
                        </form>
                    @elseif ($user->rola == 3)
                        <form method="POST" action="{{ route('user.promote', ['id' => $user->id_uzytkownika]) }}">
                            @csrf
                            <input type="submit" value="Awansuj użytkownika na moderatora">
                        </form>
                    @endif
                @endif

                @if (session('status'))
                    <p>{{ session('status') }}</p>
                @endif
                @if (session('error'))
                    <p>{{ session('error') }}</p>
                @endif
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
