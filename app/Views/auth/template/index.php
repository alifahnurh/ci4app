<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noticia+Text&family=Righteous&display=swap" rel="stylesheet">

    <!-- File CSS -->
    <link rel="stylesheet" href="/css/login/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- basscss -->
    <link href="<?= base_url() ?>/css/basscss.min.css" rel="stylesheet">

    <!-- Jquery -->
    <script src="<?= base_url() ?>/jquery/jquery.min.js"></script>

    <!-- fontawesome -->
    <script src="<?= base_url() ?>/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-green">
    <?= $this->renderSection('login'); ?>
</body>

</html>