<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="my-3">Data Pakan</h2>
            <form action="/pakan/save" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="namaPakan" class="form-label">Nama Pakan</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_pakan')) ? 'is-invalid' : ''; ?>" id="namaPakan" name="nama_pakan" placeholder="Nama Pakan" autofocus value="<?= old('nama_pakan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_pakan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" placeholder="Stok" autofocus value="<?= old('stok'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('stok'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>