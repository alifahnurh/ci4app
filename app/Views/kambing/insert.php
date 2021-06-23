<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="my-3">Form Tambah Data Kambing</h2>
            <form action="/kambing/save" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="namaKambing" class="form-label">Nama Kambing</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_kambing')) ? 'is-invalid' : ''; ?>" id="namaKambing" name="nama_kambing" placeholder="Nama Kambing" autofocus value="<?= old('nama_kambing'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_kambing'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select <?= ($validation->hasError('jns_kelamin')) ? 'is-invalid' : ''; ?>" name="jns_kelamin" id="jenisKelamin" autofocus">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jns_kelamin'); ?>
                        </div>
                        <option selected disabled value="">Pilih</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggaLahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" name="tgl_lahir" id="tanggalLahir" placeholder="Tanggal Lahir" autofocus value="<?= old('tgl_lahir'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_lahir'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="panjang" class="form-label">Panjang</label>
                    <input type="text" class="form-control <?= ($validation->hasError('panjang')) ? 'is-invalid' : ''; ?>" name="panjang" id="panjang" placeholder="Panjang" autofocus value="<?= old('panjang'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('panjang'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tinggi" class="form-label">Tinggi</label>
                    <input type="text" class="form-control <?= ($validation->hasError('tinggi')) ? 'is-invalid' : ''; ?>" name="tinggi" id="tinggi" placeholder="Tinggi" autofocus value="<?= old('tinggi'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tinggi'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="text" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" name="berat" id="berat" placeholder="Berat" autofocus value="<?= old('berat'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('berat'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lingkarDada" class="form-label">Lingkar Dada</label>
                    <input type="text" class="form-control <?= ($validation->hasError('lingkar_dada')) ? 'is-invalid' : ''; ?>" name="lingkar_dada" id="lingkarDada" placeholder="Lingkar Dada" autofocus value="<?= old('lingkar_dada'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('lingkar_dada'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>