<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="my-3" Form Hasil Pemerahan></h2>
            <form action="/pemerahan/save" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="namaKambing" class="form-label">Nama Kambing</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_kambing')) ? 'is-invalid' : ''; ?>" name="nama_kambing" id="namaKambing" placeholder="Nama Kambing" autofocus value="<?= old('nama_kambing'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_kambing'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="hasilPemerahan" class="form-label">Hasil Pemerahan</label>
                    <input type="text" class="form-control <?= ($validation->hasError('hsl_pemerahan')) ? 'is-invalid' : ''; ?> " id="hasilPemerahan" name="hsl_pemerahan" placeholder="Hasil Pemerahan" autofocus value="<?= old('hsl_pemerahan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('hsl_pemerahan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tglPemerahan" class="form-label">Tanggal Pemerahan</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tgl_pemerahan')) ? 'is-invalid' : ''; ?>" id="tglPemerahan" name="tgl_pemerahan" autofocus value="<?= old('tgl_pemerahan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_pemerahan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="wktPemerahan" class="form-label">Waktu Pemerahan</label>
                    <input type="time" class="form-control <?= ($validation->hasError('wkt_pemerahan')) ? 'is-invalid' : ''; ?>" id="wktPemerahan" name="wkt_pemerahan" autofocus value="<?= old('wkt_pemerahan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('wkt_pemerahan'); ?>
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