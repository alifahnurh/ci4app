 <div class="table-responsive">
     <table class="table table-hover table-bordered border-dark" id="datakambing" style="width:100%">
         <thead>
             <tr>
                 <th class="text-center align-middle">No</th>
                 <th class="text-center align-middle">Nama Kambing</th>
                 <th class="text-center align-middle">Jenis Kelamin</th>
                 <th class="text-center align-middle">Tanggal Lahir</th>
                 <th class="text-center align-middle">Panjang</th>
                 <th class="text-center align-middle">Tinggi</th>
                 <th class="text-center align-middle">Berat</th>
                 <th class="text-center align-middle">Lingkar Dada</th>
                 <th class="text-center align-middle">Aksi</th>
             </tr>
         </thead>
         <tbody>
             <?php $i = 1; ?>
             <?php foreach ($kambing as $row) : ?>
                 <tr>
                     <td><?= $i++; ?></th>
                     <td><?= $row['nama_kambing']; ?></td>
                     <td><?= $row['jns_kelamin']; ?></td>
                     <td><?= mediumdate_indo($row['tgl_lahir']); ?></td>
                     <td><?= $row['panjang']; ?></td>
                     <td><?= $row['tinggi']; ?></td>
                     <td><?= $row['berat']; ?></td>
                     <td><?= $row['lingkar_dada']; ?></td>
                     <td><button type="button" class="btn btn-outline-success" onclick="edit('<?= $row['no'] ?>')"><img src="/img/edit.png"></button>| <button type="button" class="btn btn-outline-danger" onclick="hapus('<?= $row['no'] ?>')"><img src="/img/delete.png"></button></td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </div>
 <script>
     $(document).ready(function() {
         $('#datakambing').DataTable()
     });

     function edit(no) {
         $.ajax({
             type: "GET",
             url: "<?= site_url('kambing/edit') ?>",
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
             text: `Apakah anda yakin menghapus data pakan ini dengan nama ${no} ?`,
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
                     url: "<?= site_url('kambing/hapus') ?>",
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
                             datakambing();
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