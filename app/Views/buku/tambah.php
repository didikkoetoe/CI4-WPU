<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <h2 class="text-center">Tambah Buku</h2>
    <hr>
    <form action="/buku/save" method="POST">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <label for="judul" class="col-sm-2 col-form-label">Judul :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    <?= $validation->getError('judul'); ?>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="sampul" class="col-sm-2 col-form-label">Sampul :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sampul" name="sampul" value="<?= old('sampul'); ?>">
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>