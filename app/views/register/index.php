<div class="ui container" style="margin-top: 7rem; display: flex; justify-content: center; max-width: 40%! important">
    <div class="ui fluid card">
        <div class="content">
            <div class="header" style="text-align: center;">Register Siswa</div>
            <div class="meta" style="text-align: center;">Daftar untuk mulai menggunakan aplikasi!</div>
        </div>
        <div class="description">
            <?php include_once ('../app/views/components/flash.php') ?>
            <!-- Form Register -->
            <form id="frm-register" action="<?= BASE_URL ?>/register/proses" method="post" class="ui form" style="padding: 12px">
                <div class="field">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" id="nisn" autocomplete="off" required>
                </div>
                <div class="field">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" autocomplete="off" required>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <label for="konfirmasi_password">Konfirmasi Password</label>
                    <input type="password" name="konfirmasi_password" id="konfirmasi_password" required>
                </div>
            </form>
        </div>
        <div class="extra content">
            <button type="button" class="ui positive button" onclick="document.getElementById('frm-register').submit()">
                <i class="ui lock icon"></i>Register
            </button>
        </div>
    </div>
</div>
