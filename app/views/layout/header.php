<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Load Bootstrap & Semantic UI -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/semantic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    
    <!-- jQuery harus di-load lebih dulu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    <!-- Semantic UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

    <title><?= APP_NAME ?></title>
</head>

<body>

    <!-- Navbar dengan Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container">
            <a class="navbar-brand text-white" href="<?= BASE_URL; ?>"><?= APP_NAME ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ui secondary menu">
                    <a class="item text-white" href="<?= BASE_URL; ?>">Home</a>
                    <a class="item text-white" href="<?= BASE_URL; ?>/product/index">Produk</a>
                    <a class="item text-white" href="<?= BASE_URL; ?>/pegawai/index">Kepegawaian</a>

                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') : ?>
                        <a href="<?= BASE_URL ?>/user/index" class="item text-white">User</a>
                    <?php endif; ?>

                    <div class="right menu">
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <a href="<?= BASE_URL ?>/login/index" class="item text-white">Login</a>
                            <a href="<?= BASE_URL ?>/register/index" class="item text-white">Register</a>
                        <?php else : ?>
                            <a href="<?= BASE_URL ?>/login/logout" class="item text-white">Logout, <?= $_SESSION['user']['username']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</body>
</html>
