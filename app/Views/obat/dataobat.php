 <div class="table-responsive">
     <table class="table table-hover table-bordered border-dark" id="dataobat">
         <thead>
             <tr>
                 <th class="text-center align-middle">No</th>
                 <th class="text-center align-middle">Nama Obat</th>
                 <th class="text-center align-middle">Stok Obat</th>
                 <th class="text-center align-middle">Keterangan</th>
                 <th class="text-center align-middle">Aksi</th>
             </tr>
         </thead>
         <tbody>
             <?php $i = 1; ?>
             <?php foreach ($obat as $row) : ?>
                 <tr>
                     <td><?= $i++; ?></td>
                     <td><?= $row['nama_obat']; ?></td>
                     <td><?= $row['stok_obat']; ?></td>
                     <td><?= $row['keterangan']; ?></td>
                     <td>
                         <button type="button" class="btn btn-success btn-sm" onclick="edit('<?= $row['no'] ?>')">
                             <img src="/img/edit.png">
                         </button> |
                         <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['no'] ?>')">
                             <img src="/img/delete.png">
                         </button>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </div>
 <script>
     $(document).ready(function() {
         $('#dataobat').DataTable();
     });

     function edit(no) {
         $.ajax({
             type: "GET",
             url: "<?= site_url('obat/edit') ?>",
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
             text: `Apakah anda yakin menghapus data obat ini dengan id ${no} ?`,
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
                     url: "<?= site_url('obat/hapus') ?>",
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
                             dataobat();
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