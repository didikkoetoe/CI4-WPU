<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <h3 class="text-center">Daftar Orang</h3>
    <form action="" method="POST">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan keyword pencarian" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari">Cari</button>
        </div>
    </form>
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
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 + (6 * ($currentPage - 1)); ?>
            <?php foreach ($orang as $bk): ?>
            <tr>
                <th scope="row">
                    <?= $i++; ?>
                </th>
                <td>
                    <?= $bk['nama']; ?>
                </td>
                <td>
                    <?= $bk['alamat']; ?>
                </td>
                <td><a href="" class="btn btn-success">Detail</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $pager->links('orang', 'orang_pagination'); ?>
</div>
<?= $this->endSection(); ?>