<head>
    <style>
        .status-hadir {
            color: green;
            font-weight: bold;
        }

        .status-sakit {
            color: red;
            font-weight: bold;
        }

        .status-izin {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>


<body>

    <div class="ui container">
        <div class="ui centered card mt-3" style="width: 18rem;">
            <div class="content">
                <div class="header"><?= htmlspecialchars($data['user']['nama']); ?></div>
                <div class="meta">NISN: <?= htmlspecialchars($data['user']['nisn']); ?></div>
                <div class="description">Kelas: <?= htmlspecialchars($data['user']['kelas']); ?></div>
            </div>
        </div>

        <h3>Riwayat Absensi</h3>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Mata Pelajaran</th>
                    <th>Sesi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['absensi'] as $absen): ?>
                    <tr>
                        <td><?= date('d-m-Y', strtotime($absen['tanggal'])); ?></td>
                        <td><?= htmlspecialchars($absen['mata_pelajaran']); ?></td>
                        <td><?= htmlspecialchars($absen['sesi']); ?></td>
                        <td class="status-<?= strtolower($absen['keterangan']) ?>">
                            <?= htmlspecialchars($absen['keterangan']) ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (!empty($data['absensi']) && isset($_GET['tanggal'])): ?>
            <h3>Detail Absensi pada <?= date('d-m-Y', strtotime($_GET['tanggal'])); ?></h3>
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Sesi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['absensi'] as $detail): ?>
                        <tr>
                            <td><?= htmlspecialchars($detail['mata_pelajaran']); ?></td>
                            <td><?= htmlspecialchars($detail['sesi']); ?></td>
                            <td><?= htmlspecialchars($detail['keterangan']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="ui bottom attached button">
            <a href="<?= BASE_URL; ?>/siswa/index" class="ui basic button">Kembali</a>
        </div>
    </div>
</body>