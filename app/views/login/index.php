<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <style>
        body {
            display: flexbox;
            height: 100vh;
            margin: 0;
            background-color:#ffffff;
        }
        .left-panel {
            flex: 1;
            justify-content: space-between;
            display: flex;
            background-size: contain;
        }
        .right-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background-color:rgb(15, 212, 163);
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            width: 400px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            color: #333;
        }
        .logo {
            width: 100px;
            margin-bottom: 15px;
        }
        .forgot-password {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="left-panel"></div>
    <div class="right-panel">
        <div class="login-container">
            <img src="<?=BASE_URL;?>/img/Testing (1).png" alt="Logo Sekolah" class="logo">
            <h2>Selamat Datang</h2>
            <p>Silakan login & pastikan hadir tepat waktu</p>
            <?php include_once('../app/views/components/flash.php'); ?>
            <form id="frm-login" action="<?= BASE_URL ?>/login/proses" method="post" class="ui form">
                <div class="field">
                    <label for="nisn">Nomor Induk Siswa Nasional</label>
                    <div class="ui input">
                        <input type="text" name="nisn" id="nisn" autocomplete="off" required placeholder="Masukkan NISN" onkeypress="return hanyaAngka(event)" maxlength="10">
                    </div>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <div class="ui input">
                        <input type="password" name="password" id="password" required placeholder="Masukkan Password">
                    </div>
                </div>
                <a href="<?=BASE_URL;?>/siswa/index" class="forgot-password">Lupa Password?</a>
                <br><br>
                <button type="button" class="ui green button fluid" onclick="document.getElementById('frm-login').submit()">
                    <i class="ui lock icon"></i> Masuk
                </button>
            </form>
            <div class="footer-text">
                &copy; 2025 SMP Muhammadiyah 16 Lubuk Pakam <br>
                "Sesungguhnya sholatku, ibadahku, hidupku dan matiku hanya untuk Allah"
            </div>
        </div>
    </div>

    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
