<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="my-3">Form Tambah Data Obat</h2>
            <form action="/obat/save" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="namaObat" class="form-label">Nama Obat</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" id="namaObat" name="nama_obat" placeholder="Nama Obat" autofocus value="<?= old('nama_obat'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_obat'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stokObat" class="form-label">Stok Obat</label>
                    <input type="text" class="form-control <?= ($validation->hasError('stok_obat')) ? 'is-invalid' : ''; ?>" id="stokObat" name="stok_obat" placeholder="Stok Obat" autofocus value="<?= old('stok_obat'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('stok_obat'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autofocus></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>