<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Kambing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('kambing/save', ['class' => 'formkambing']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namaKambing" class="form-label">Nama Kambing</label>
                    <input type="text" class="form-control" id="namaKambing" name="nama_kambing" placeholder="Nama Kambing">
                    <div class="invalid-feedback errorNama"></div>
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jns_kelamin" id="jenisKelamin" autofocus">
                        <option selected disabled value="">--Pilih--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback errorJenis"></div>
                </div>
                <div class="mb-3">
                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggalLahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                    <div class="invalid-feedback errorTgl"></div>
                </div>
                <div class="mb-3">
                    <label for="panjang" class="form-label">Panjang</label>
                    <input type="text" class="form-control" id="panjang" name="panjang" placeholder="Panjang">
                    <div class="invalid-feedback errorPanjang"></div>
                </div>
                <div class="mb-3">
                    <label for="tinggi" class="form-label">Tinggi</label>
                    <input type="text" class="form-control" id="tinggi" name="tinggi" placeholder="Tinggi">
                    <div class="invalid-feedback errorTinggi"></div>
                </div>
                <div class="mb-3">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="text" class="form-control" id="berat" name="berat" placeholder="Berat">
                    <div class="invalid-feedback errorBerat"></div>
                </div>
                <div class="mb-3">
                    <label for="lingkarDada" class="form-label">Lingkar Dada</label>
                    <input type="text" class="form-control" id="lingkarDada" name="lingkar_dada" placeholder="Lingkar Dada">
                    <div class="invalid-feedback errorLingkar"></div>
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
        $('.formkambing').submit(function(e) {
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

                        if (response.error.jns_kelamin) {
                            $('#jenisKelamin').addClass('is-invalid');
                            $('.errorJenis').html(response.error.jns_kelamin);
                        } else {
                            $('#jenisKelamin').removeClass('is-invalid');
                            $('.errorJenis').html('');
                        }

                        if (response.error.tgl_lahir) {
                            $('#tanggalLahir').addClass('is-invalid');
                            $('.errorTgl').html(response.error.tgl_lahir);
                        } else {
                            $('#tanggalLahir').removeClass('is-invalid');
                            $('.errorTgl').html('');
                        }

                        if (response.error.panjang) {
                            $('#panjang').addClass('is-invalid');
                            $('.errorPanjang').html(response.error.panjang);
                        } else {
                            $('#panjang').removeClass('is-invalid');
                            $('.errorPanjang').html('');
                        }

                        if (response.error.tinggi) {
                            $('#tinggi').addClass('is-invalid');
                            $('.errorTinggi').html(response.error.tinggi);
                        } else {
                            $('#tinggi').removeClass('is-invalid');
                            $('.errorTinggi').html('');
                        }

                        if (response.error.berat) {
                            $('#berat').addClass('is-invalid');
                            $('.errorBerat').html(response.error.berat);
                        } else {
                            $('#berat').removeClass('is-invalid');
                            $('.errorBerat').html('');
                        }

                        if (response.error.lingkar_dada) {
                            $('#lingkarDada').addClass('is-invalid');
                            $('.errorLingkar').html(response.error.lingkar_dada);
                        } else {
                            $('#lingkarDada').removeClass('is-invalid');
                            $('.errorLingkar').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        })
                        $('#modaltambah').modal('hide');
                        datakambing();
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