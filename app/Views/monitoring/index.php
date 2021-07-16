<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- link dataTable -->
<link rel="stylesheet" href="/assets/dataTable/dataTables.bootstrap5.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap5.min.css" crossorigin="anonymous">

<script src="/assets/dataTable/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="/assets/dataTable/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js" crossorigin="anonymous"></script>

<!-- moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="mx-4">
    <div class="row">
        <h1 class="breadcumb mt-2">Dashboard</h1>
        <p class="breadcumb-item muted">Dashboard<b class="breadcumb-active blue">Monitoring</b></p>
        <?php
        foreach ($monitoring as $key => $value) {
            $waktu[] = $value['waktu'];
            $suhu[] = $value['suhu'];
            $kelembapan[] = $value['kelembapan'];
            $amonia[] = $value['amonia'];
        }

        ?>

        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <i class="fas fa-info-circle fa-lg"></i>
            <div id="text-info">Data terakhir masuk pada tanggal <strong><label id="current_waktu"></label> </strong></div>
        </div>

        <!-- <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="fas fa-exclamation-triangle fa-lg"></i>
            <div class="text-alert" style="margin-left: 5px; font:18px">Kadar gas amonia dalam <strong> keadaan standar </strong></div>
        </div> -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><label id="current_suhu"></label><sup>o</sup>C</h3>
                    <p>Suhu</p>
                </div>
                <div class="icon">
                    <i class="fas fa-thermometer-three-quarters"></i>
                </div>
                <div class="small-box-footer"></div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="small-box bg-lime">
                <div class="inner">
                    <h3><label id="current_kelembapan"></label><small>%</small></h3>
                    <p>Kelembapan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="small-box-footer"></div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><label id="current_amonia"></label><small>ppm</small></h3>
                    <p>Kadar Gas Amonia</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wind"></i>
                </div>
                <div class="small-box-footer"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class=" table-responsive">
                    <div class="card-title">
                        <a href="/monitoring/exportpdf" type="button" class="btn btn-primary" target="_blank"><i class="fas fa-file-download"></i> Download File</a>
                    </div>
                    <table class="table table-hover table-bordered border-dark display" id="datamonitoring" style="width:100%; text-align:center">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Waktu</th>
                                <th class="text-center align-middle">Suhu (<sup>o</sup>C)</th>
                                <th class="text-center align-middle">Kelembapan (<small>%</small>)</th>
                                <th class="text-center align-middle">Gas Amonia (<small>ppm</small>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($monitoring as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= tgl_indo($row['waktu']); ?></td>
                                    <td><?= $row['suhu']; ?></td>
                                    <td><?= $row['kelembapan']; ?></td>
                                    <td><?= $row['amonia']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    //main data variable
    var $waktu = [];
    var $suhu = [];
    var $kelembapan = [];
    var $amonia = [];

    //function to get Data
    function executeQuery() {
        $.ajax({
            url: "<?= site_url('monitoring/getData') ?>",
            type: 'GET',
            success: function(data) {
                var $new_data = data.data;

                //set breadcump data
                document.getElementById('current_waktu').innerHTML = $new_data[$new_data.length - 1].waktu;
                document.getElementById('current_suhu').innerHTML = $new_data[$new_data.length - 1].suhu;
                document.getElementById('current_kelembapan').innerHTML = $new_data[$new_data.length - 1].kelembapan;
                document.getElementById('current_amonia').innerHTML = $new_data[$new_data.length - 1].amonia;

                //reset data variable
                $waktu = [];
                $suhu = [];
                $kelembapan = [];
                $amonia = [];

                //fill data variable 
                $new_data.forEach(function(element) {
                    $waktu.push(element.waktu);
                    $suhu.push(element.suhu);
                    $kelembapan.push(element.kelembapan);
                    $amonia.push(element.amonia);
                });
            }
        });
    }

    $(document).ready(function() {
        var table = $('#datamonitoring').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print',
            ]
        });

        table.buttons().container()
            .appendTo('#datamonitoring_wrapper .col-md-6:eq(0)');

        executeQuery();

        // moment.js
        var el = document.getElementById('current_waktu');
        text = el.textContent;
        new_time = moment(text).format('DD-MM-YYYY');
        el.innerHTML = new_time;
        console.log(text);

        //execute code every 10 second
        setInterval(function() {
            executeQuery();
        }, 10000);
    });

    if (<?= $row['amonia'] ?> >= 3.00) {
        $('.text-alert').html('<strong>Perhatian</strong> kadar gas amonia <strong>melebihi standar</strongKadar>');
    }
</script>
<?= $this->endSection(); ?>