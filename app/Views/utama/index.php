<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Chart-plugin-zoom -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.0.1/chartjs-plugin-zoom.min.js" integrity="sha512-b+q5md1qwYUeYsuOBx+E8MzhsDSZeoE80dPP1VCw9k/KA9LORQmaH3RuXjlpu3u1rfUwh7s6SHthZM3sUGzCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
foreach ($utama as $key => $value) {
    $waktu[] = $value['waktu'];
    $suhu[] = $value['suhu'];
    $kelembapan[] = $value['kelembapan'];
    $amonia[] = $value['amonia'];
}
?>

<div class="mx-4">
    <div class="row">
        <h1 class="breadcumb mt-2">Dashboard</h1>
        <p class="breadcumb-item mt-2 muted">Dashboard<b class="breadcumb-active blue">Home</b></p>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box border">
                <span class="info-box-icon bg-teal"><i class="fas fa-thermometer-three-quarters"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Suhu</span>
                    <span class="info-box-number">30<sup>o</sup>C</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box border">
                <span class="info-box-icon bg-lime"><i class="fas fa-tint"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kelembapan</span>
                    <span class="info-box-number">90<small>%</small></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box border">
                <span class="info-box-icon bg-yellow"> <i class="fas fa-wind"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kadar Gas Amonia</span>
                    <span class="info-box-number">90<small>ppm</small></span>
                </div>
            </div>
        </div>
        <p class="warning">
            <span><small> *Standar suhu, kelembapan, dan kadar gas amonia menurut penelitian</small></span>
        </p>
        <div class="card">
            <h5 class="card-header">Grafk Monitoring Kandang</h5>
            <div class="card-body">

                <canvas id="myChart"> </canvas>

                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: <?= json_encode($waktu) ?>,
                            datasets: [{
                                label: 'Suhu',
                                data: <?= json_encode($suhu) ?>,
                                borderColor: '#0046FF',
                                fill: false
                            }, {
                                label: 'Kelembapan',
                                data: <?= json_encode($kelembapan) ?>,
                                borderColor: '#008719',
                                fill: false
                            }, {
                                label: 'Kadar Amonia',
                                data: <?= json_encode($amonia) ?>,
                                borderColor: '#CE8600',
                                fill: false
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            plugins: {
                                zoom: {
                                    zoom: {
                                        wheel: {
                                            enabled: true
                                        },
                                        pinch: {
                                            enabled: true
                                        },
                                        mode: 'xy',
                                    }
                                }
                            },
                            responsive: true,
                            aspectRatio: 1.6,
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<script>
    function executeQuery() {
        $.ajax({
            url: "<?= site_url('utama/index') ?>",
            success: function(data) {
                // do something with the return value here if you like 
            }
        });
        updateCall();
    }

    function updateCall() {
        setTimeout(function() {
            executeQuery()
        }, 30000);
    }

    $(document).ready(function() {
        executeQuery();
    });
</script>



<?= $this->endSection(); ?>