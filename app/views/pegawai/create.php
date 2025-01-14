<div class="ui container">
    <div class="ui segments">
        <div class="ui segment">
            <h4>Tambah Pegawai</h4>
        </div>
        <div class="ui segment">
            <!-- konten -->
            <form action="<?= BASE_URL ?>/pegawai/store" method="post" class="ui form">
                <div class="field">
                    <label>Nama</label>
                    <input type="text" name="inp_nama"/>
                </div>
                <div class="field" style="text-align:center;">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="radio" name="inp_jk" value="L"> Laki-Laki
                    <input type="radio" name="inp_jk" value="P"> Perempuan
                </div>
                <div class="field">
                    <label for="tanggal">Tanggal Lahir</label>
                    <div class="input">
                        <input type="date" name="inp_tanggal">
                    </div>
                </div>
                <div class="field">
                    <label for="jabat">Jabatan</label>
                         <div class="class input">
                          <select name="inp_jabat" >
                            <option value="Direktur">Direktur</option>
                            <option value="Sekertaris">Sekertaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="staff">Staff</option>
                            <option value="ob">OB</option>
                          </select>
                    </div>
                </div>
                    <div class="field">
                    <input type="submit" value="Simpan" class="ui black button">
                </div>
            </form>
            <!-- /konten -->
        </div>
    </div>
</div>