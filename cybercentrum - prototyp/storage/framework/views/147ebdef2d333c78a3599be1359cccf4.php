<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybercentrum - Użytkownicy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 1px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Lista użytkowników</h1>
    <table>
        <thead>
            <tr>
                <th>Nazwa użytkownika</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->nazwa_uzytkownika); ?></td>
                    <td>
                        <a href="<?php echo e(route('user.profile', $user->id_uzytkownika)); ?>">
                            <button type="button">Pokaż profil</button>
                        </a>
                        <?php if(Auth::user()->isAdmin()): ?>
                            <?php if($user->rola == 2): ?>
                                <form method="POST" action="<?php echo e(route('user.demote', $user->id_uzytkownika)); ?>" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit">Odebrać uprawnienia moderatora</button>
                                </form>
                            <?php else: ?>
                                <form method="POST" action="<?php echo e(route('user.promote', $user->id_uzytkownika)); ?>" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit">Nadać uprawnienia moderatora</button>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(Auth::user()->isAdmin() || Auth::user()->isModerator()): ?>
                            <form method="POST" action="<?php echo e(route('user.ban', $user->id_uzytkownika)); ?>" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit">Zbanuj</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php /**PATH C:\tools\xampp\htdocs\cybercentrum\resources\views/user/index.blade.php ENDPATH**/ ?>