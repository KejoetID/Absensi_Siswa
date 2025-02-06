<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?= BASE_URL ?>/css/semantic.css">
    <link rel="stylesheet" href=" <?= BASE_URL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <title>
        <?= APP_NAME ?>
    </title>
</head>

<body>
    <div class="ui blue inverted pointing menu">
        <div class="header item">
            <?= APP_NAME ?>
        </div>
        <a href="<?= BASE_URL ?>" class="item">
            Home
        </a>
        <a href="<?= BASE_URL ?>/product/index" class="item" class="item">
            Produk
        </a>
        <a href="<?= BASE_URL ?>/pegawai/index" class="item">
            Kepegawaian
        </a>
        <!-- menu user hanya diakses oleh admin -->
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') : ?>
            <a href="<?php echo BASE_URL ?>/user/index" class="item">User</a>
            
           
        <?php endif; ?>
        <div class="right menu">
            <?php if (!isset($_SESSION['user'])) : ?>
            <a href="<?= BASE_URL ?>/login/index" class="item">Login</a>
            <a href="<?= BASE_URL ?>/register/index" class="item">Register</a>
            <?php else : ?>
            <a href="<?= BASE_URL ?>/login/logout" class="item">Logout,<?= $_SESSION['user']['username']; ?></a>
            <?php endif ; ?>
        </div>
    </div>