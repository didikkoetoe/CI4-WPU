<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <h2 class="text-center">Edit Buku</h2>
    <hr>
    <form action="/buku/update/<?= $buku['id']; ?>" method="POST">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
        <div class="row mb-3">
            <label for="judul" class="col-sm-2 col-form-label">Judul :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= ($validation->hasError('judul')) ? old('judul') : $buku['judul']; ?>">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    <?= $validation->getError('judul'); ?>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= ($validation->hasError('penulis')) ? old('penulis') : $buku['penulis']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= ($validation->hasError('penerbit')) ? old('penerbit') : $buku['penerbit']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="sampul" class="col-sm-2 col-form-label">Sampul :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sampul" name="sampul" value="<?= ($validation->hasError('sampul')) ? old('sampul') : $buku['sampul']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>