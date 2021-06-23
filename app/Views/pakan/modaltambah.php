<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Pakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('pakan/save', ['class' => 'formpakan']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namaPakan" class="form-label">Nama Pakan</label>
                    <input type="text" class="form-control" id="namaPakan" name="nama_pakan" placeholder="Nama Pakan">
                    <div class="invalid-feedback errorNama"></div>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok">
                    <div class="invalid-feedback errorStok"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- simpan data dengan AJAX -->
<script>
    $(document).ready(function() {
        $('.formpakan').submit(function(e) {
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
                        if (response.error.nama_pakan) {
                            $('#namaPakan').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama_pakan);
                        } else {
                            $('#namaPakan').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }

                        if (response.error.stok) {
                            $('#stok').addClass('is-invalid');
                            $('.errorStok').html(response.error.stok);
                        } else {
                            $('#stok').removeClass('is-invalid');
                            $('.error').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        })
                        $('#modaltambah').modal('hide');
                        datapakan();
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