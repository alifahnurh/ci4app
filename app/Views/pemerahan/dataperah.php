 <div class="table-responsive">
     <table class="table table-hover table-bordered border-dark" id="dataperah">
         <thead>
             <tr>
                 <th class="text-center align-middle">No</th>
                 <th class="text-center align-middle">Nama Kambing</th>
                 <th class="text-center align-middle">Hasil Pemerahan</th>
                 <th class="text-center align-middle">Tanggal Pemerahan</th>
                 <th class="text-center align-middle">Waktu Pemerahan</th>
                 <th class="text-center align-middle">Aksi</th>
             </tr>
         </thead>
         <tbody>
             <?php $i = 1; ?>
             <?php foreach ($pemerahan as $perah) : ?>
                 <tr>
                     <td><?= $i++; ?></th>
                     <td><?= $perah['nama_kambing']; ?></td>
                     <td><?= $perah['hsl_pemerahan']; ?></td>
                     <td><?= mediumdate_indo($perah['tgl_pemerahan']); ?></td>
                     <td><?= $perah['wkt_pemerahan']; ?></td>
                     <td><button type="button" class="btn btn-outline-success" onclick="edit('<?= $perah['no'] ?>')"><img src="/img/edit.png"></button>|<button type="button" class="btn btn-outline-danger" onclick="hapus('<?= $perah['no'] ?>')"><img src="/img/delete.png"></button>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </div>
 <script>
     $(document).ready(function() {
         $('#dataperah').DataTable();
     });

     function edit(no) {
         $.ajax({
             type: "GET",
             url: "<?= site_url('pemerahan/edit') ?>",
             data: {
                 no: no
             },
             dataType: "json",
             success: function(response) {
                 if (response.sukses) {
                     $('.viewmodal').html(response.sukses).show();
                     $('#modaledit').modal('show');
                 }
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
     }

     function hapus(no) {
         Swal.fire({
             title: 'Hapus',
             text: `Apakah anda yakin menghapus hasil pemerahan ini dengan nama ${no} ?`,
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya',
             cancelButtonText: 'Tidak',
         }).then((result) => {
             if (result.value) {
                 $.ajax({
                     type: "post",
                     url: "<?= site_url('pemerahan/hapus') ?>",
                     data: {
                         no: no
                     },
                     dataType: "json",
                     success: function(response) {
                         if (response.sukses) {
                             Swal.fire({
                                 icon: 'success',
                                 title: 'Berhasil',
                                 text: response.sukses
                             });
                             dataperah();
                         }
                     },
                     error: function(xhr, ajaxOptions, thrownError) {
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                     }
                 });
             }
         });
     }
 </script>