 <!-- Modal -->
 <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Obat</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <?= form_open('obat/updatedata', ['class' => 'formobat']) ?>
             <?= csrf_field(); ?>
             <div class="modal-body">
                 <input type="hidden" name="no" value="<?= $no ?>">
                 <div class="mb-3">
                     <label for="namaObat" class="form-label">Nama Obat</label>
                     <input type="text" class="form-control" id="namaObat" name="nama_obat" placeholder="Nama Obat" value="<?= $nama_obat ?>">
                     <div class="invalid-feedback errorNama">

                     </div>
                 </div>
                 <div class="mb-3">
                     <label for="stokObat" class="form-label">Stok Obat</label>
                     <input type="text" class="form-control" id="stokObat" name="stok_obat" placeholder="Stok Obat" value="<?= $stok_obat ?>">
                     <div class="invalid-feedback errorStok">

                     </div>
                 </div>
                 <div class="mb-3">
                     <label for="keterangan" class="form-label">Keterangan</label>
                     <input class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= $keterangan ?>">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
             <?= form_close(); ?>
         </div>
     </div>
 </div>
 <!-- simpan data dengan AJAX -->
 <script>
     $(document).ready(function() {
         $('.formobat').submit(function(e) {
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
                     $('.btnsimpan').html('Update');
                 },
                 success: function(response) {
                     if (response.error) {
                         if (response.error.nama_obat) {
                             $('#namaObat').addClass('is-invalid');
                             $('.errorNama').html(response.error.nama_obat);
                         } else {
                             $('#namaObat').removeClass('is-invalid');
                             $('.errorNama').html('');
                         }

                         if (response.error.stok_obat) {
                             $('#stokObat').addClass('is-invalid');
                             $('.errorStok').html(response.error.stok_obat);
                         } else {
                             $('#stokObat').removeClass('is-invalid');
                             $('.errorStok').html('');
                         }

                     } else {
                         Swal.fire({
                             icon: 'success',
                             title: 'Berhasil',
                             text: response.sukses,
                         })
                         $('#modaledit').modal('hide');
                         dataobat();
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