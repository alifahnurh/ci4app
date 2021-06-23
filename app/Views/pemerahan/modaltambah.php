<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Hasil Pemerahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('pemerahan/save', ['class' => 'formperah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namaKambing" class="form-label">Nama Kambing</label>
                    <input type="text" class="form-control" name="nama_kambing" id="namaKambing" placeholder="Nama Kambing" autofocus>
                    <div class="invalid-feedback errorNama">

                    </div>
                </div>
                <div class="mb-3">
                    <label for="hasilPemerahan" class="form-label">Hasil Pemerahan</label>
                    <input type="text" class="form-control" id="hasilPemerahan" name="hsl_pemerahan" placeholder="Hasil Pemerahan" autofocus>
                    <div class="invalid-feedback errorHasil">

                    </div>
                </div>
                <div class="mb-3">
                    <label for="tglPemerahan" class="form-label">Tanggal Pemerahan</label>
                    <input type="date" class="form-control" id="tglPemerahan" name="tgl_pemerahan" autofocus>
                    <div class="invalid-feedback errorTgl">

                    </div>
                </div>
                <div class="mb-3">
                    <label for="wktPemerahan" class="form-label">Waktu Pemerahan</label>
                    <input type="time" class="form-control" id="wktPemerahan" name="wkt_pemerahan" autofocus>
                    <div class="invalid-feedback errorWkt">

                    </div>
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
        $('.formperah').submit(function(e) {
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
                        if (response.error.nama_kambing) {
                            $('#namaKambing').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama_kambing);
                        } else {
                            $('#namaKambing').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }

                        if (response.error.hsl_pemerahan) {
                            $('#hasilPemerahan').addClass('is-invalid');
                            $('.errorHasil').html(response.error.hsl_pemerahan);
                        } else {
                            $('#hasilPemerahan').removeClass('is-invalid');
                            $('.errorHasil').html('');
                        }

                        if (response.error.tgl_pemerahan) {
                            $('#tglPemerahan').addClass('is-invalid');
                            $('.errorTgl').html(response.error.tgl_pemerahan);
                        } else {
                            $('#tglPemerahan').removeClass('is-invalid');
                            $('.errorTgl').html('');
                        }

                        if (response.error.wkt_pemerahan) {
                            $('#wktPemerahan').addClass('is-invalid');
                            $('.errorWkt').html(response.error.wkt_pemerahan);
                        } else {
                            $('#wktPemerahan').removeClass('is-invalid');
                            $('.errorWkt').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        })
                        $('#modaltambah').modal('hide');
                        dataperah();
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