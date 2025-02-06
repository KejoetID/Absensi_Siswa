<div class="ui container">
    <div class="ui centered card" style="width: 18rem;">
        <div class="content">
            <div class="header">
                <?= $data['product']['nama']; ?>
            </div>
            <div class="meta">
                <?= $data['product']['kode']; ?>
            </div>
            <div class="description">
                <?= $data['product']['deskripsi']; ?>
            </div>
        </div>
        <div class="extra content">
            <span class="left floated">
                Rp. <?= number_format($data['product']['harga'], 0, ',', '.'); ?>
            </span>
            <span class="right floated">
                Stok: <?= $data['product']['stock']; ?>
            </span>
        </div>
        <div class="ui bottom attached button">
            <a href="<?= BASE_URL; ?>/product" class="ui basic button">Kembali</a>
        </div>
    </div>
</div>