<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <a href="/Buku/tambah" class="btn btn-primary float-end">Tambah Buku</a>
    <h3 class="text-center">Daftar Buku</h3>
    <?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Sampul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach ($buku as $bk): ?>
            <tr>
                <th scope="row">
                    <?= $i++; ?>
                </th>
                <td>
                    <img src="/img/<?= $bk['sampul']; ?>" alt="Sampul Buku <?= $bk['judul']; ?>" class="gambar">
                </td>
                <td>
                    <?= $bk['judul']; ?>
                </td>
                <td><a href="/buku/<?= $bk['slug']; ?>" class="btn btn-success">Detail</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>