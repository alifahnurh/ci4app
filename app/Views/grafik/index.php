<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Chart-plugin-zoom -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.0.1/chartjs-plugin-zoom.min.js" integrity="sha512-b+q5md1qwYUeYsuOBx+E8MzhsDSZeoE80dPP1VCw9k/KA9LORQmaH3RuXjlpu3u1rfUwh7s6SHthZM3sUGzCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- <meta http-equiv="Refresh" Content="5"> -->

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
                        <canvas id="suhu" class="chart"></canvas>
                    </div>
                </div>
                <!-- <div class="col-xl-6"> -->
                <div class="card mb-4">
                    <h5 class="card-header">Grafik Kelembapan</h5>
                    <div class="card-body">
                        <div class="chartKelembapan">
                            <canvas id="kelembapan" class="chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-6"> -->
                <div class="card mb-4">
                    <h5 class="card-header">Grafik Kadar Gas Amonia</h5>
                    <div class="card-body">
                        <div class="chartAmonia">
                            <canvas id="kdr_amonia" class="chart"></canvas>
                        </div>
                 </div>
             </div>
        </div>
    </div>
</div>
<script>
    // main data variable
    var $data = {
        waktu: [],
        suhu: [],
        kelembapan: [],
        kdr_amonia: []
    }
    // border color variable
    var $border_colors = {
      suhu: "#0046FF",
      kelembapan: "#008719",
      kdr_amonia: "#CE8600"
    }

    // label color variabel
    var $labels = {
      suhu: "Suhu",
      kelembapan: "Kelembapan",
      kdr_amonia: "Kadar Amonia"
    }

    // chart id variable to store every id of chart class
    var $chart_id = [];

    // myChart variable to stores chart object that can be destroy
    var $myChart = [];

    //function to get data
    function executeQuery() {
        $.ajax({
            url: "<?= site_url('grafik/getData') ?>",
            type: 'GET',
            success: function(data) {
                var $new_data = data.data;

                // reset main data variable
                $data.waktu = [];
                $data.suhu = [];
                $data.kelembapan = [];
                $data.kdr_amonia = [];
                // fill main data variable
                $new_data.forEach(function(element){
                    $data.waktu.push(element.waktu);
                    $data.suhu.push(element.suhu);
                    $data.kelembapan.push(element.kelembapan);
                    $data.kdr_amonia.push(element.amonia);
                });

                //draw chart
                drawChart();
            }
        });
    }
    function drawChart(){
        $chart_id.forEach(function(item,index){
            var ctx = document.getElementById(item);
            var chart_item = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: $data.waktu,
                    datasets: [{
                        label: $labels[item],
                        data: $data[item],
                        borderColor: $border_colors[item],
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

            // push chart object
            $myChart[item] = chart_item;
        });
    }
    $(document).ready(function() {
        // initial chart id
        $('.chart').each(function(index) {
          $chart_id.push($(this).attr('id'));
        });

        // get data
        executeQuery();

        // execute code every 10 second
        setInterval(function() {
            // destroy all chart object
            $chart_id.forEach(function(item,index){
                $myChart[item].destroy();
            });
            executeQuery();
        }, 10000);
    });
</script>
<?= $this->endSection(); ?>