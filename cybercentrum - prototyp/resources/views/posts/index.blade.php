<!DOCTYPE HTML>
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
                    <li><a href="{{ Auth::check() ? route('user.profile', ['id' => Auth::user()->id_uzytkownika]) : route('login') }}">Mój profil</a></li>
                    <li><a href="{{ route('user.index') }}">Użytkownicy</a></li>
                    <li><a href="{{ route('logout') }}">Wyloguj się</a></li>
                </ul>
            </nav>
        </section>

        <!-- Main -->
        <section id="main">
            <div class="container">
                <!-- Post List -->
                <section class="box">
                    <header>
                        <h2>Posty</h2>
                    </header>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('posts.create') }}" class="button primary">Utwórz Post</a>
                    <div class="post-list mt-3">
                        @foreach ($posts as $post)
                            <section class="box">
                                <h3><a href="{{ route('posts.show', $post->id_posta) }}">{{ $post->tytul_posta }}</a></h3>
                                <p>autor: <a href="{{ route('user.profile', $post->user->id_uzytkownika) }}">{{ $post->user->nazwa_uzytkownika }}</a> - {{ $post->data_utworzenia }}</p>
                            </section>
                        @endforeach
                    </div>
                    <div class="pagination">
                        {{ $posts->links() }}
                    </div>
                </section>
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
