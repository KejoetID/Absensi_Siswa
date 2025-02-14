<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <!-- Load Bootstrap & Semantic UI -->
    <link href="<?= BASE_URL ?>/css/bootstrap.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>/css/semantic.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>/css/siswa.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <title><?= APP_NAME ?></title>
</head>

<body>
    <!-- Navbar responsif -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="<?= BASE_URL; ?>">
                <?= APP_NAME ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= BASE_URL; ?>">Home</a>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= BASE_URL; ?>/Siswa/index">Riwayat Absensi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= BASE_URL; ?>/barcode/index">Barcode</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= BASE_URL ?>/login/logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= BASE_URL ?>/siswa/index">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle mr-2" src="<?= BASE_URL ?>/img/じや⛩️(@G_Ya_170)⛩️.jpg"
                            alt="User Profile Picture" width="40" height="40" />
                        <?php if (isset($_SESSION['user'])): ?>
                            <div class="text-white">
                                <strong>
                                    <?= isset($data['user']) ? htmlspecialchars($data['user']['nama']) : htmlspecialchars($data['siswa']['nama']) ?>
                                </strong><br>
                                <?= isset($data['user']) ? htmlspecialchars($data['user']['kelas']) : htmlspecialchars($data['siswa']['kelas']) ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>

</html>