<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="<?= base_url('public/assets/js/helpers.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/config.js') ?>"></script>
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
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