<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <h3 class="text-center">Alamat</h3>
    <hr>
    <?php foreach ($alamat as $alamat): ?>
    <ul class="list-group mb-3">
        <li class="list-group-item">
            <?= $alamat['type']; ?>
        </li>
        <li class="list-group-item">
            <?= $alamat['alamat']; ?>
        </li>
        <li class="list-group-item">
            <?= $alamat['provinsi']; ?>
        </li>
    </ul>
    <?php endforeach ?>
</div>
<?= $this->endSection(); ?>