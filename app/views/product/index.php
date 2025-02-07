<div class="ui container mt-4">
    <div class="ui segment">
        <h2 class="ui centered header">List Produk</h2>
        <?php include_once('../app/views/components/flash.php') ?>
        <div class="ui grid" style="margin-bottom: 1em;">
            <div class="left floated eight wide column">
                
            </div>
            
        </div>

        <table class="ui table ">
            <thead>
                <tr>
                    
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                        <th class="center aligned">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['products'] as $key => $product): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $product['kode'] ?></td>
                        <td>
                            <div class="ui list">
                                <div class="item">  
                                    <a href="<?= BASE_URL ?>/product/show/<?= $product['id'] ?>"><?= $product['nama'] ?></a>
                                </div>
                                <div class="item">
                                    <!-- <div class="description"><?= $product['deskripsi'] ?></div> -->
                                </div>
                            </div>
                        </td>
                        <td class="left aligned">Rp. <?= number_format($product['harga'], 0, ',', '.') ?></td>
                        <td class="center aligned"><?= $product['stock'] ?></td>
                        <td class="center aligned collapsing">
                            <?php if (isset($_SESSION['user'])): ?>
                                <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                                    <div class="ui icon buttons">
                                        <button class="ui basic button"
                                            onclick="window.location.href='<?= BASE_URL ?>/product/edit/<?= $product['id'] ?>'">
                                            <i class="edit icon"></i>
                                        </button>
                                        <button class="ui basic button"
                                            onclick="window.location.href='<?= BASE_URL ?>/product/create/<?= $product['id'] ?>'">
                                            <i class="add icon"></i>
                                        </button>
                                        <button class="ui basic button"
                                            onclick="window.location.href='<?= BASE_URL ?>/product/detail/<?= $product['id'] ?>'">
                                            <i class="eye icon"></i>
                                        </button>
                                        <button class="ui basic button"
                                            onclick="if(confirm('Yakin ingin menghapus <?= $product['kode'] ?>?')) window.location.href='<?= BASE_URL ?>/product/destroy/<?= $product['id'] ?>'">
                                            <i class="trash icon"></i>
                                        </button>
                                    </div>
                                <?php elseif ($_SESSION['user']): ?>
                                    <button class="ui basic button"
                                        onclick="window.location.href='<?= BASE_URL ?>/product/detail/<?= $product['id'] ?>'">
                                        <i class="eye icon"></i>
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>