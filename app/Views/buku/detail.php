<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <h2 class="text-center">Detail</h2>
    <hr>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/<?= $buku['sampul']; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $buku['judul']; ?>
                    </h5>
                    <p class="card-text"><b>Penulis : </b>
                        <?= $buku['penulis']; ?>
                    </p>
                    <p class="card-text"><b>Penerbit : </b>
                        <?= $buku['penerbit']; ?>
                    </p>
                    <a href="/buku/edit/<?= $buku['slug']; ?>" class="btn btn-warning">Edit</a>
                    <!-- Tombol hapus -->
                    <form action="/buku/<?= $buku['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin ?')">Hapus</button>
                    </form>
                    <a href="/buku">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>