<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }

        .sidebar {
            background: #001F7F;
            right: 0.8%;
            color: white;
            height: 90vh;
            padding: 20px;
        }

        .sidebar .item {
            color: white;
            display: block;
            padding: 10px;
        }

        .sidebar .item:hover {
            background: #003399;
        }

        .dashboard-container {
            padding: 20px;
        }

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

        .profile-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                height: auto;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid d-flex flex-column flex-md-row">
        <!-- Sidebar -->
        <div class="sidebar col-md-3">
            <div class="profile-container">
                <input type="file" id="upload-photo" style="display: none;" accept="image/*">
                <img src="default-profile.png" id="profile-picture" class="profile-img" alt="Foto Profil">
            </div>
            <a class="item text-center"><?= $_SESSION['user']['nama'] ?></a>
            <p class="text-center">Kelas : <?= htmlspecialchars($data['siswa']['kelas']) ?></p>

            <div class="ui form">
                <div class="field">
                    <label class="text-white">Pilih Bulan/Tanggal/Tahun</label>
                    <input type="date" class="form-control" id="search-date">
                </div>
                <div class="field mt-2">
                    <label class="text-white">Pilih Mata Pelajaran</label>
                    <select class="form-select" id="search-subject">
                        <option value="">Semua</option>
                        <option>Matematika</option>
                        <option>PAI (Fikh)</option>
                        <option>Bahasa Indonesia</option>
                    </select>
                </div>
                <button class="ui green button mt-3 w-100" id="search-button">Cari</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-container col-md-9">
            <div class="ui message">
                <?php
                // Mengatur zona waktu
                date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan zona waktu Anda
                
                // Mengambil jam saat ini
                $currentHour = date("H"); // Format 24 jam
                
                // Menentukan ucapan berdasarkan jam
                if ($currentHour >= 5 && $currentHour < 12) {
                    $greeting = "Selamat Pagi"; // 5:00 - 11:59
                } elseif ($currentHour >= 12 && $currentHour < 17) {
                    $greeting = "Selamat Siang"; // 12:00 - 16:59
                } elseif ($currentHour >= 17 && $currentHour < 21) {
                    $greeting = "Selamat Sore"; // 17:00 - 20:59
                } else {
                    $greeting = "Selamat Malam"; // 21:00 - 4:59
                }
                ?>

                <i class="info icon"></i> <strong>Halo Selamat <?= $greeting ?>,
                    <?= htmlspecialchars($data['siswa']['nama']) ?></strong>. Semangat Belajar untuk hari ini! Jangan
                lupa absensi yaa!
            </div>
            <div class="ui segment">
                <h4 class="ui header">Riwayat Absensi</h4>
                <input type="text" id="search-input" class="form-control mb-3"
                    placeholder="Cari berdasarkan mata pelajaran...">
                <table class="ui celled table" id="absensi-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Tanggal</th>
                            <th>Sesi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['absensi'])): ?>
                            <?php $no = 1;
                            foreach ($data['absensi'] as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="subject"><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
                                    <td class="date"><?= date("d/m/Y", strtotime($row['tanggal'])) ?></td>
                                    <td>Sesi <?= htmlspecialchars($row['sesi']) ?></td>
                                    <td class="status-<?= strtolower($row['keterangan']) ?>">
                                        <?= htmlspecialchars($row['keterangan']) ?>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_URL ?>/siswa/detail/<?= $data['siswa']['nisn'] ?>/<?= urlencode($row['tanggal']) ?>"
                                            class="ui basic button">
                                            <i class="eye icon"></i> Detail
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Belum ada data absensi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>