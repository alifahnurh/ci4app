<?= $this->extend('layouts/template'); ?>
<?= $this->section('css'); ?>
<style>
    @media only screen and (max-width:  768px){
        .chart_container{
            height: 173px;
        }
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Chart-plugin-zoom -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.0.1/chartjs-plugin-zoom.min.js" integrity="sha512-b+q5md1qwYUeYsuOBx+E8MzhsDSZeoE80dPP1VCw9k/KA9LORQmaH3RuXjlpu3u1rfUwh7s6SHthZM3sUGzCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="mx-4">
    <div class="row">
        <h1 class="breadcumb mt-2">Dashboard</h1>
        <p class="breadcumb-item mt-2 muted">Dashboard<b class="breadcumb-active blue">Home</b></p>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box border">
                <span class="info-box-icon bg-teal"><i class="fas fa-thermometer-three-quarters"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Suhu</span>
                    <span class="info-box-number"><label id="curent_suhu"></label><sup>o</sup>C</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box border">
                <span class="info-box-icon bg-lime"><i class="fas fa-tint"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kelembapan</span>
                    <span class="info-box-number"><label id="curent_kelembapan"></label><small>%</small></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box border">
                <span class="info-box-icon bg-yellow"> <i class="fas fa-wind"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kadar Gas Amonia</span>
                    <span class="info-box-number"><label id="curent_amonia"></label><small>ppm</small></span>
                </div>
            </div>
        </div>
        <p class="warning">
            <span><small> *Standar suhu, kelembapan, dan kadar gas amonia menurut penelitian</small></span>
        </p>
        <div class="card">
            <h5 class="card-header">Grafk Monitoring Kandang</h5>
            <div class="card-body" id="chart_container" style="height: 820px;">
                <canvas id="myChart"></canvas>
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

    //chart variabel
    var myChart;

    //function to get data
    function executeQuery() {
        $.ajax({
            url: "<?= site_url('utama/getData') ?>",
            type: 'GET',
            success: function(data) {
                var $new_data = data.data;

                // set breadcump data
                document.getElementById('curent_suhu').innerHTML = $new_data[$new_data.length - 1].suhu;
                document.getElementById('curent_kelembapan').innerHTML = $new_data[$new_data.length - 1].kelembapan;
                document.getElementById('curent_amonia').innerHTML = $new_data[$new_data.length - 1].amonia;

                // reset data variable
                $waktu = [];
                $suhu = [];
                $kelembapan = [];
                $amonia = [];

                // fill data variable
                $new_data.forEach(function(element){
                    $waktu.push(element.waktu);
                    $suhu.push(element.suhu);
                    $kelembapan.push(element.kelembapan);
                    $amonia.push(element.amonia);
                });

                // draw chart
                drawChart();
            }

        });
    }

    function drawChart(){
        var ctx = document.getElementById('myChart').getContext('2d');
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: $waktu,
                datasets: [{
                    label: 'Suhu',
                    data: $suhu,
                    borderColor: '#0046FF',
                    fill: false
                }, {
                    label: 'Kelembapan',
                    data: $kelembapan,
                    borderColor: '#008719',
                    fill: false
                }, {
                    label: 'Kadar Amonia',
                    data: $amonia,
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
    }
    $(document).ready(function() {
        executeQuery();

        // execute code every 10 second
        setInterval(function() {
            //destroy chart
            myChart.destroy();
            //call data and redraw chart
            executeQuery();
        }, 10000);
    });
</script>
<?= $this->endSection(); ?>