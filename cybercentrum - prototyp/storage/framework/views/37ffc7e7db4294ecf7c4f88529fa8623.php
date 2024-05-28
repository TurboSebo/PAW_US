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
                <header>
                    <h2>Profil użytkownika</h2>
                </header>
                <p><strong>Nick:</strong> <?php echo e($user->nazwa_uzytkownika); ?></p>
                <p><strong>Rola:</strong> 
                    <?php if($user->rola == 1): ?>
                        Administrator
                    <?php elseif($user->rola == 2): ?>
                        Moderator
                    <?php else: ?>
                        Użytkownik
                    <?php endif; ?>
                </p>
                <?php if($isOwner): ?>
                    <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                <?php endif; ?>
                <p><strong>O mnie:</strong> <?php echo e($user->o_mnie); ?></p>

                <?php if($isOwner): ?>
                    <h3>Edytuj informacje o sobie</h3>
                    <form method="POST" action="<?php echo e(route('user.update', ['id' => $user->id_uzytkownika])); ?>">
                        <?php echo csrf_field(); ?>
                        <label for="about">O mnie:</label><br/>
                        <textarea id="about" name="about" rows="4" cols="50"><?php echo e($user->o_mnie); ?></textarea><br/>
                        <input type="submit" value="Zapisz">
                    </form>
                    <?php if(session('status')): ?>
                        <p><?php echo e(session('status')); ?></p>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(Auth::check() && (Auth::user()->rola == 1 || Auth::user()->rola == 2) && !$isOwner): ?>
                    <?php if($user->konto_aktywne): ?>
                        <form method="POST" action="<?php echo e(route('user.ban', ['id' => $user->id_uzytkownika])); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Zbanuj użytkownika">
                        </form>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('user.unban', ['id' => $user->id_uzytkownika])); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Odbanuj użytkownika">
                        </form>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(Auth::check() && Auth::user()->rola == 1 && !$isOwner): ?>
                    <?php if($user->rola == 2): ?>
                        <form method="POST" action="<?php echo e(route('user.demote', ['id' => $user->id_uzytkownika])); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Zdegraduj użytkownika z moderatora">
                        </form>
                    <?php elseif($user->rola == 3): ?>
                        <form method="POST" action="<?php echo e(route('user.promote', ['id' => $user->id_uzytkownika])); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="Awansuj użytkownika na moderatora">
                        </form>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(session('status')): ?>
                    <p><?php echo e(session('status')); ?></p>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <p><?php echo e(session('error')); ?></p>
                <?php endif; ?>
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
<?php /**PATH C:\tools\xampp\htdocs\cybercentrum\resources\views/user/profile.blade.php ENDPATH**/ ?>