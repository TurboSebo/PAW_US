<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Cybercentrum - Dashboard</title>
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
                <!-- Post List -->
                <section class="box">
                    <header>
                        <h2>Posty</h2>
                    </header>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <a href="<?php echo e(route('posts.create')); ?>" class="button primary">Utwórz Post</a>
                    <div class="post-list mt-3">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <section class="box">
                                <h3><a href="<?php echo e(route('posts.show', $post->id_posta)); ?>"><?php echo e($post->tytul_posta); ?></a></h3>
                                <p>autor: <a href="<?php echo e(route('user.profile', $post->user->id_uzytkownika)); ?>"><?php echo e($post->user->nazwa_uzytkownika); ?></a> - <?php echo e($post->data_utworzenia); ?></p>
                            </section>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="pagination">
                        <?php echo e($posts->links()); ?>

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
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.dropotron.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/browser.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/breakpoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/util.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\tools\xampp\htdocs\cybercentrum\resources\views/posts/index.blade.php ENDPATH**/ ?>