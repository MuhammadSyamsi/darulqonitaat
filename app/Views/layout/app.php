<?php // layout.php 
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Dashboard' ?></title>

    <!-- Tailwind CSS -->
    <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-950 text-slate-100">

    <?= $this->renderSection('content') ?>

</body>

</html>