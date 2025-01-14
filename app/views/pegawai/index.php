<div class="ui container">
			<div class="ui segment">
            <h4 style="text-align: center; font-size:30px;">List Pegawai</h4>
            <!-- konten -->
            <?php include_once('../app/views/components/flash.php') ?>
				<table class="ui table">
			<thead>
			<tr style="font-size:16px;">
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>Jabatan</th>
				<?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') : ?>
				<th>
				
					<a href="<?php echo BASE_URL ?>/pegawai/create" class="ui positive labeled icon button fluid">
						<i class="plus icon"></i>Tambah
					</a>
				</th>
				
				<?php endif; ?>
			</tr>
		</thead>
		<tbody style="text-align: left;">
			<?php foreach ($data['pegawai'] as $i => $pegawai) : ?>
				<tr>
					<!-- <td><img src="images/<?= $data['foto'] ?>"width="100"></td> -->
					<td><?php echo $i + 1 ?></td>
					<td><?php echo $pegawai['nama'] ?></td>
					<td><?php echo $pegawai['jenis_kelamin'] ?></td>
					<td><?php echo $pegawai['tanggal_lahir'] ?></td>
					<td><?php echo $pegawai['jabatan'] ?></td>
					<?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') : ?>
					<td class="collapsing">
						<!-- Tombol Ubah -->
						<a href="<?php echo BASE_URL ?>/pegawai/edit/<?php echo $pegawai['id'] ?>" 
						class="ui yellow mini labeled icon button <?php echo ($pegawai['id'] == 1 || $pegawai['id'] == 2) ? 'disabled' : '' ?>"  
						<?php echo ($pegawai['id'] == 1 || $pegawai['id'] == 2) ? 'tabindex="-1" aria-disabled="true"' : '' ?> 
						onclick="return confirm('Yakin Ingin Mengubah?')">
							<i class="edit icon"></i>Ubah
						</a>

						<!-- Tombol Hapus -->
						<a href="<?php echo BASE_URL ?>/pegawai/destroy/<?php echo $pegawai['id'] ?>" 
						class="ui mini labeled negative icon button <?php echo ($pegawai['id'] == 1 || $pegawai['id'] == 2) ? 'disabled' : '' ?>" 
						<?php echo ($pegawai['id'] == 1 || $pegawai['id'] == 2) ? 'tabindex="-1" aria-disabled="true"' : '' ?> 
						onclick="return confirm('Yakin ingin menghapus?')">
							<i class="trash icon"></i>Hapus
						</a>
					</td>

				<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>