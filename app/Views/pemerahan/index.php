<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- link dataTable -->
<link rel="stylesheet" href="/assets/dataTable/dataTables.bootstrap5.min.css" crossorigin="anonymous">
<script src="/assets/dataTable/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="/assets/dataTable/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>

<div class="mx-4">
    <div class="col-sm-12 col-md-12">
        <h1 class="breadcumb mt-2">Dashboard</h1>
        <p class="breadcumb-item muted">Dashboard<b class="breadcumb-active blue">Hasil Pemerahan</b></p>
        <div class="card mb-4">
            <div class="card-body">

                <div class="card-title">
                    <button type="button" class="btn btn-primary tomboltambah">+ Tambah Data</button>
                </div>

                <p class="card-text viewdata"> </p>
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>
    function dataperah() {
        //membuat menjadi ajax
        $.ajax({
            url: "<?= site_url('pemerahan/ambildata'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            //menampilkan error
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
    $(document).ready(function() {
        dataperah();

        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pemerahan/insert'); ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>