<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="my-3">Form Tambah Hasil Produk</h2>
            <form action="/produk/save" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="namaProduk" name="nama_produk" placeholder="Nama Produk" autofocus value="<?= old('nama_produk'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_produk'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stokProduk" class="form-label">Stok Produk</label>
                    <input type="text" class="form-control <?= ($validation->hasError('stok_produk')) ? 'is-invalid' : ''; ?>" id="stokProduk" name="stok_produk" placeholder="Stok Produk" autofocus value="<?= old('stok_produk'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('stok_produk'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>