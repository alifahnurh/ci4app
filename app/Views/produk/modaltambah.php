<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Hasil Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('produk/save', ['class' => 'formproduk']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="namaProduk" name="nama_produk" placeholder="Nama Produk" autofocus>
                    <div class="invalid-feedback errorNama">

                    </div>
                </div>
                <div class="mb-3">
                    <label for="stokProduk" class="form-label">Stok Produk</label>
                    <input type="text" class="form-control" id="stokProduk" name="stok_produk" placeholder="Stok Produk" autofocus>
                    <div class="invalid-feedback errorStok">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary simpandata">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- simpan data dengan AJAX -->
<script>
    $(document).ready(function() {
        $('.formproduk').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable');
                    $('.btnsimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nama_produk) {
                            $('#namaProduk').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama_produk);
                        } else {
                            $('#namaProduk').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }

                        if (response.error.stok_produk) {
                            $('#stokProduk').addClass('is-invalid');
                            $('.errorStok').html(response.error.stok_produk);
                        } else {
                            $('#stokProduk').removeClass('is-invalid');
                            $('.errorStok').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        })
                        $('#modaltambah').modal('hide');
                        dataproduk();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>