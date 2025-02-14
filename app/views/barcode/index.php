<style>
    .ui.message {
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .ui.container {
        margin-top: 50px;
        max-width: 600px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .barcode-container {
        background-color: #f4f4f4;
        padding: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
    }

    img {
        max-height: 400px;
        max-width: 80%;
    }

    .ui.button.green {
        width: 100%;
        padding: 15px;
        font-size: 16px;
        border-radius: 8px;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="ui message">
            <?php
            date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu
            $currentHour = date("H"); // Format 24 jam
            
            if ($currentHour >= 5 && $currentHour < 12) {
                $greeting = "Selamat Pagi";
            } elseif ($currentHour >= 12 && $currentHour < 17) {
                $greeting = "Selamat Siang";
            } elseif ($currentHour >= 17 && $currentHour < 21) {
                $greeting = "Selamat Sore";
            } else {
                $greeting = "Selamat Malam";
            }
            ?>
            <i class="info icon"></i> <strong>Halo Selamat <?= $greeting ?>,
                <?= htmlspecialchars($data['siswa']['nama']) ?></strong>. Semangat Belajar untuk hari ini! Jangan
            lupa absensi yaa!
        </div>

        <div class="ui container">
            <h2 style="margin-bottom: 20px;">Barcode Absensi Anda</h2>

            <div class="barcode-container">
                <img src="data:image/png;base64,<?= $data['barcode'] ?>" alt="QR Code Data Siswa">
            </div>

            <div style="margin-top: 30px;">
                <a href="<?= BASE_URL ?>/barcode/download" class="ui button green">
                    <i class="download icon"></i> Unduh Barcode
                </a>
            </div>
        </div>
    </div>
</body>

</html>