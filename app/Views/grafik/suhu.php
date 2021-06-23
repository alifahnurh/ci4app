<?php
foreach ($grafik as $key => $value) {
    $waktu[] = $value['waktu'];
    $suhu[] = $value['suhu'];
    $kelembapan[] = $value['kelembapan'];
    $amonia[] = $value['amonia'];
}
?>
<div class="content" id="suhu">
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
                }
            }
        });
    </script>
</div>