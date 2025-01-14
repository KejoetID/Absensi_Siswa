<div class="ui container">
    <div class="ui segments">
        <div class="ui segment">
            <h4>Ubah Data</h4>
        </div>
        <div class="ui segment">
        <form action="<?= BASE_URL ?>/pegawai/update/<?= $data['pegawai']['id'] ?>" method="post" class="ui form">
                <div class="field">
                    <label>Nama</label>
                    <input type="text" name="inp_nama" value="<?= $data['pegawai']['nama'] ?>" >
                </div>
                <div class="field" >
                    <label for="jk">Jenis Kelamin</label>
                    <input type="radio" name="inp_jk" value="L" > Laki-Laki
                    <input type="radio" name="inp_jk" value="P"> Perempuan
                </div>
                    <div class="field">
                    <label for="tanggal">Tanggal Lahir</label>
                    <div class="input">
                        <input type="date" name="inp_tanggal">
                    </div>
                <div class="field">
                    <label for="jabat">Jabatan</label>
                         <div class="class input">
                          <select name="inp_jabat" >
                            <option value="Direktur">Direktur</option>
                            <option value="Sekertaris">Sekertaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Staff">Staff</option>
                            <option value="OB">OB</option>
                          </select>
                    </div>
                </div>
                              <div class="field">
                    <input type="submit" value="Ubah" class="ui black button">
                </div>
            </form>
        </div>
    </div>
</div>