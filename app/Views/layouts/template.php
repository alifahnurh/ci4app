<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMOKA | Sistem Monitoring Kandang</title>

    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noticia+Text&family=Righteous&display=swap" rel="stylesheet">

    <!-- File CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- basscss -->
    <link href="<?= base_url() ?>/css/basscss.min.css" rel="stylesheet">

    <!-- Jquery -->
    <script src="<?= base_url() ?>/jquery/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <script src="<?= base_url() ?>/js/all.min.js" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/sweetalert2.min.css">
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>

    <!-- <script src="?>/assets/Chart/dist/Chart.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

    <!-- parsial -->
    <?= $this->include('layouts/navbar'); ?>

    <!-- Section -->
    <?= $this->renderSection('content'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

    <!--JavaScript-->
    <script src="/js/script.js"></script>

    <!-- iconify -->
    <!-- <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script> -->

</body>

</html>