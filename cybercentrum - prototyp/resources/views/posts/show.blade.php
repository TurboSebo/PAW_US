<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Cybercentrum - {{ $post->tytul_posta }}</title>
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
                <!-- Post Details -->
                <section class="box">
                    <header>
                        <h2>{{ $post->tytul_posta }}</h2>
                        <p>by <a href="{{ route('user.profile', $post->user->id_uzytkownika) }}">{{ $post->user->nazwa_uzytkownika }}</a> on {{ $post->data_utworzenia }}</p>
                    </header>
                    <p>{{ $post->tresc }}</p>

                    <!-- Post Actions -->
                    @if (Auth::check() && $post->canBeDeletedBy(Auth::user()))
                        <form action="{{ route('posts.destroy', $post->id_posta) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button small">Usuń</button>
                        </form>
                    @endif
                    <footer>
                        <ul class="actions">
                            <li><a href="{{ route('posts.index') }}" class="button">Wróć do postów</a></li>
                        </ul>
                    </footer>
                </section>

                <!-- Comments -->
                <section>
                    <header class="major">
                        <h2>Komentarze</h2>
                    </header>
                    @foreach ($post->komentarze()->where('czy_usuniete', 0)->get() as $komentarz)
                        <section class="box">
                            <p>{{ $komentarz->tresc }}</p>
                            <p>by <a href="{{ route('user.profile', $komentarz->user->id_uzytkownika) }}">{{ $komentarz->user->nazwa_uzytkownika }}</a> on {{ $komentarz->data_wstawienia }}</p>
                            @if (Auth::check() && $komentarz->canBeDeletedBy(Auth::user()))
                                <form action="{{ route('komentarze.destroy', $komentarz->id_komentarza) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button small">Usuń</button>
                                </form>
                            @endif
                        </section>
                    @endforeach

                    <!-- Add Comment -->
                    @if (Auth::check() && !$post->czy_usuniete)
                        <form action="{{ route('komentarze.store', $post->id_posta) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="tresc">Dodaj komentarz:</label>
                                <textarea name="tresc" id="tresc" rows="2" class="form-control" required style="resize: none;"></textarea>
                            </div>
                            <button type="submit" class="button primary">Dodaj</button>
                        </form>
                    @endif
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
