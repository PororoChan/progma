<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="<?= base_url('public/assets/js/helpers.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/config.js') ?>"></script>
    <?= $this->include('split/v_import') ?>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php if (session()->get('role') == 1) : ?>
                <?= $this->include('split/v_sidebar') ?>
            <?php endif; ?>
            <div class="layout-page">
                <?= $this->include('split/v_navbar') ?>