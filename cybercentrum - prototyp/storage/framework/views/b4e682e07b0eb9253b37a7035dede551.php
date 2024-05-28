<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Cybercentrum - <?php echo e($post->tytul_posta); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>" />
</head>
<body class="is-preload">
    <div id="page-wrapper">
        <!-- Header -->
        <section id="header">
            <!-- Logo -->
            <h1><a href="<?php echo e(url('/')); ?>">Cybercentrum</a></h1>
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                    <li><a href="<?php echo e(route('posts.index')); ?>">Posty</a></li>
                    <li><a href="<?php echo e(Auth::check() ? route('user.profile', ['id' => Auth::user()->id_uzytkownika]) : route('login')); ?>">Mój profil</a></li>
                    <li><a href="<?php echo e(route('user.index')); ?>">Użytkownicy</a></li>
                    <li><a href="<?php echo e(route('logout')); ?>">Wyloguj się</a></li>
                </ul>
            </nav>
        </section>

        <!-- Main -->
        <section id="main">
            <div class="container">
                <!-- Post Details -->
                <section class="box">
                    <header>
                        <h2><?php echo e($post->tytul_posta); ?></h2>
                        <p>by <a href="<?php echo e(route('user.profile', $post->user->id_uzytkownika)); ?>"><?php echo e($post->user->nazwa_uzytkownika); ?></a> on <?php echo e($post->data_utworzenia); ?></p>
                    </header>
                    <p><?php echo e($post->tresc); ?></p>

                    <!-- Post Actions -->
                    <?php if(Auth::check() && $post->canBeDeletedBy(Auth::user())): ?>
                        <form action="<?php echo e(route('posts.destroy', $post->id_posta)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="button small">Usuń</button>
                        </form>
                    <?php endif; ?>
                    <footer>
                        <ul class="actions">
                            <li><a href="<?php echo e(route('posts.index')); ?>" class="button">Wróć do postów</a></li>
                        </ul>
                    </footer>
                </section>

                <!-- Comments -->
                <section>
                    <header class="major">
                        <h2>Komentarze</h2>
                    </header>
                    <?php $__currentLoopData = $post->komentarze()->where('czy_usuniete', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komentarz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <section class="box">
                            <p><?php echo e($komentarz->tresc); ?></p>
                            <p>by <a href="<?php echo e(route('user.profile', $komentarz->user->id_uzytkownika)); ?>"><?php echo e($komentarz->user->nazwa_uzytkownika); ?></a> on <?php echo e($komentarz->data_wstawienia); ?></p>
                            <?php if(Auth::check() && $komentarz->canBeDeletedBy(Auth::user())): ?>
                                <form action="<?php echo e(route('komentarze.destroy', $komentarz->id_komentarza)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="button small">Usuń</button>
                                </form>
                            <?php endif; ?>
                        </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Add Comment -->
                    <?php if(Auth::check() && !$post->czy_usuniete): ?>
                        <form action="<?php echo e(route('komentarze.store', $post->id_posta)); ?>" method="POST" class="mt-3">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="tresc">Dodaj komentarz:</label>
                                <textarea name="tresc" id="tresc" rows="2" class="form-control" required style="resize: none;"></textarea>
                            </div>
                            <button type="submit" class="button primary">Dodaj</button>
                        </form>
                    <?php endif; ?>
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
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.dropotron.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/browser.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/breakpoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/util.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\tools\xampp\htdocs\cybercentrum\resources\views/posts/show.blade.php ENDPATH**/ ?>