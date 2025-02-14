<style>
    .day-button {
        cursor: pointer;
        padding: 10px;
        text-align: center;
        border-radius: 15px;
        /* Membuat kotak tombol menjadi rounded */
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        transition: background-color 0.3s, color 0.3s;
    }

    .day-button.active {
        background-color: #fbbd08;
        color: white;
    }

    .day-button p {
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .ui.statistics .statistic {
            width: 100% !important;
            text-align: center;
        }

        .ui.grid .column {
            width: 100% !important;
        }

        .col-md-6 {
            width: 100% !important;
            margin-bottom: 1rem;
        }

        .text-right {
            text-align: left !important;
        }

        .day-button {
            padding: 8px;
            font-size: 14px;
        }
    }

    .ui.card {
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        background-color: #f9f9f9;
    }

    .ui.card img {
        margin-bottom: 10px;
        width: 80px;
        height: 80px;
        object-fit: cover;
    }

    .statistics {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .statistic {
        text-align: center;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .text-right label {
        font-weight: bold;
        font-size: 16px;
    }

    .day-button {
        border: none;
        background-color: transparent;
        text-align: center;
        font-weight: bold;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .day-button.active {
        background-color: rgb(0, 255, 85);
        color: white;
        border-radius: 10px;
    }

    .calendar-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 10px;
    }

    .day-box {
        width: calc(14% - 10px);
        /* Ukuran fleksibel */
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .day-box:hover {
        background-color: #f1f1f1;
    }

    .day-name {
        font-weight: bold;
        font-size: 1.1em;
        margin-bottom: 5px;
    }

    .day-number {
        font-size: 1.2em;
        font-weight: bold;
    }

    /* Kelas untuk menandai elemen aktif */
    .day-box.active {
        background-color: #f0f8ff;
        border-color:rgb(234, 0, 255);
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .day-box {
            width: calc(30% - 10px);
        }
    }

    @media (max-width: 480px) {
        .day-box {
            width: calc(45% - 10px);
        }
    }
</style>
</head>

<body>
    <div class="container mt-4">
        <div class="ui segment">
            <p>
                <i class="smile icon"></i>
                Halo Selamat Pagi, <b><?= htmlspecialchars($data['siswa']['nama']) ?></b>! Semangat belajar untuk hari
                ini! Jangan lupa absensi ya!
            </p>
        </div>
        <div class="ui segment">
            <div class="ui yellow segment">
                <h2 class="ui header">
                    Absensi Siswa
                    <i class="calendar alternate outline icon blue"></i>
                </h2>
            </div>


            <?php
            // Inisialisasi counter
            $hadir = 0;
            $sakit = 0;
            $izin = 0;

            // Hitung jumlah kehadiran berdasarkan keterangan
            foreach ($data['absensi'] as $absen) {
                if ($absen['keterangan'] === 'Hadir') {
                    $hadir++;
                } elseif ($absen['keterangan'] === 'Sakit') {
                    $sakit++;
                } elseif ($absen['keterangan'] === 'Izin') {
                    $izin++;
                }
            }
            ?>

            <div class="ui three statistics">
                <div class="statistic">
                    <div class="value"><?= htmlspecialchars($hadir) ?></div>
                    <div class="label">Hadir</div>
                </div>
                <div class="statistic">
                    <div class="value"><?= htmlspecialchars($sakit) ?></div>
                    <div class="label">Sakit</div>
                </div>
                <div class="statistic">
                    <div class="value"><?= htmlspecialchars($izin) ?></div>
                    <div class="label">Izin</div>
                </div>
            </div>



        </div>
        <div class="ui segment">
            <h3 class="ui header">Riwayat Absensi Siswa</h3>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <?php
                    // Mengatur waktu lokal dan menampilkan tanggal dalam bahasa Indonesia
                    $formatter = new IntlDateFormatter(
                        'id_ID', // Format bahasa Indonesia
                        IntlDateFormatter::FULL,
                        IntlDateFormatter::NONE,
                        'Asia/Jakarta', // Zona waktu (sesuaikan dengan kebutuhan)
                        IntlDateFormatter::GREGORIAN
                    );
                    echo '<p id="date-range">' . $formatter->format(new DateTime()) . '</p>';
                    ?>
                </div>
                <div class="col-md-6 text-right">
                    <label for="se  arch-date">Pilih Tanggal:</label>
                    <input class="icon date" id="search-date" type="date" />
                </div>
            </div>
            <br>
            <div class="ui grid calendar-grid">
                <?php
                // Array hari dalam bahasa Indonesia
                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

                // Gunakan tahun dan bulan saat ini
                $year = date('Y');  // Tahun saat ini
                $month = date('m'); // Bulan saat ini
                
                // Perulangan untuk menampilkan 7 hari pertama bulan ini
                for ($i = 1; $i <= 7; $i++) {
                    $timestamp = strtotime("$year-$month-$i");
                    $dayIndex = date('N', $timestamp) - 1;
                    $dayName = $days[$dayIndex];
                    ?>
                    <div class="day-box" onclick="highlightDay(this)">
                        <p class="day-name"><?= $dayName ?></p>
                        <div class="ui circular segment day-number"><?= $i ?></div>
                    </div>
                <?php } ?>
            </div>

            <br>
        </div>


    </div>

    <script>
        function highlightDay(element) {
            // Menghapus kelas aktif dari semua tombol hari
            document.querySelectorAll('.day-button').forEach(function (btn) {
                btn.classList.remove('active');
            });
            // Menambahkan kelas aktif ke tombol hari yang diklik
            element.classList.add('active');
        }

        $(document).ready(function () {
            $('#search-date').change(function () {
                var selectedDate = new Date($(this).val());
                var options = { year: 'numeric', month: 'long', day: 'numeric' };
                var dayNames = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

                if (isNaN(selectedDate.getTime())) {
                    selectedDate = new Date();
                }

                var selectedDateStr = selectedDate.toLocaleDateString('id-ID', options);
                var dayName = dayNames[selectedDate.getDay()];
                $('#date-range').text(dayName + ', ' + selectedDateStr);
            });
        });

        function highlightDay(element) {
            // Hapus kelas aktif dari semua elemen
            document.querySelectorAll('.day-box').forEach(function (day) {
                day.classList.remove('active');
            });
            // Tambahkan kelas aktif ke elemen yang diklik
            element.classList.add('active');
        }

    </script>
</body>

</html>