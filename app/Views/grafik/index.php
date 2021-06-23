<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Chart-plugin-zoom -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.0.1/chartjs-plugin-zoom.min.js" integrity="sha512-b+q5md1qwYUeYsuOBx+E8MzhsDSZeoE80dPP1VCw9k/KA9LORQmaH3RuXjlpu3u1rfUwh7s6SHthZM3sUGzCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<meta http-equiv="Refresh" Content="5">

<div class="mx-4">
    <div class="row">
        <h1 class="breadcumb mt-2">Dashboard</h1>
        <p class="breadcumb-item muted">Dashboard<b class="breadcumb-active blue">Grafik</b></p>
                <?php
                foreach ($grafik as $key => $value) {
                    $waktu[] = $value['waktu'];
                    $suhu[] = $value['suhu'];
                    $kelembapan[] = $value['kelembapan'];
                    $amonia[] = $value['amonia'];
                }
                ?>
                <!-- <div class="col-xl-6"> -->
                <div class="card mb-4">
                    <h5 class="card-header">Grafik Suhu</h5>
                    <div class="card-body">
                        <canvas id="suhu"></canvas>
                        <script>
                            var ctx = document.getElementById('suhu').getContext('2d');
                            var suhu = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode($waktu) ?>,
                                    datasets: [{
                                        label: 'suhu',
                                        data: <?= json_encode($suhu) ?>,
                                        borderColor: '#0046FF',
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
                <!-- <div class="col-xl-6"> -->
                <div class="card mb-4">
                    <h5 class="card-header">Grafik Kelembapan</h5>
                    <div class="card-body">
                        <div class="chartKelembapan">
                            <canvas id="kelembapan"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('kelembapan').getContext('2d');
                            var kelembapan = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode($waktu) ?>,
                                    datasets: [{
                                        label: 'kelembapan',
                                        data: <?= json_encode($kelembapan) ?>,
                                        borderColor: '#008719',
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
                <!-- <div class="col-xl-6"> -->
                <div class="card mb-4">
                    <h5 class="card-header">Grafik Kadar Gas Amonia</h5>
                    <div class="card-body">
                        <div class="chartAmonia">
                            <canvas id="kdr_amonia"></>
                        </div>
                        <script>
                            var ctx = document.getElementById('kdr_amonia');
                            var kdr_amonia = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode($waktu) ?>,
                                    datasets: [{
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
</div>

<script>
    // $(document).ready(function() {
    //     var interval = function() {
    //         $.ajax({
    //             url: "",
    //             cache: false,
    //             success: function(html) {
    //                 $(".content").html(response.sukses).show();
    //             },
    //             Timeout: 1000
    //         });
    //     };
    //     setInterval(interval, 2000);
    // });

    function executeQuery() {
        $.ajax({
            url: "<?= site_url('grafik/index') ?>",
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