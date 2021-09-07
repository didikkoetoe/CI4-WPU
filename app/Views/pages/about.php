<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<h2 class="text-center mt-3">About Me</h2>
<hr>
<p class="text-center">Hallo Dunia, perkenalkan, nama saya adalah
    <?= $nama; ?>, umur saya saat ini adalah
    <?= $umur; ?> tahun.</p>
<?= $this->endSection(); ?>