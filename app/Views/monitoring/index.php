<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>

<!-- link dataTable -->
<link rel="stylesheet" href="/assets/dataTable/dataTables.bootstrap5.min.css" crossorigin="anonymous">
<script src="/assets/dataTable/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="/assets/dataTable/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>

<div class="mx-4">
    <div class="row">
        <h1 class="breadcumb mt-2">Dashboard</h1>
        <p class="breadcumb-item muted">Dashboard<b class="breadcumb-active blue">Monitoring</b></p>
        <?php

        use CodeIgniter\I18n\Time;

        foreach ($monitoring as $key => $value) {
            $waktu[] = $value['waktu'];
            $suhu[] = $value['suhu'];
            $kelembapan[] = $value['kelembapan'];
            $amonia[] = $value['amonia'];
        }
        ?>

        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <i class="fas fa-info-circle fa-lg"></i>
            <div id="text-info">Data terakhir masuk pada tanggal <?= date("d-m-Y H:i:s", strtotime ($value['waktu'])) ?></div>
        </div>

        <h1 class="notifikasi"></h1>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?= $value['suhu']; ?><sup>o</sup>C</h3>
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
                    <h3><?= $value['kelembapan']; ?><small>%</small></h3>
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
                    <h3><?= $value['amonia']; ?><small>ppm</small></h3>
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
                    <table class="table table-hover table-bordered border-dark" id="datamonitoring">
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
    $(document).ready(function() {
        $('#datamonitoring').DataTable();
    });

    if( <?= $row['amonia'] ?> >= 3.00){
        alert('Kadar gas amonia melebihi standar')
    }
</script>
<?= $this->endSection(); ?>