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
    <style>
        #dropLogin li a {
            transition: 0.3s ease-in-out;
        }

        #dropLogin li a:hover {
            transition: 0.3s ease-in-out;
        }

        #btnLoginOpt i {
            transition: all 0.3s ease-in-out;
            display: none;
        }

        #btnLoginOpt:hover {
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        #btnLoginOpt:hover i {
            transition: all 0.3s ease-in-out;
            display: block;
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <nav class="navbar navbar-example navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold text-primary fs-4" href="javascript:void(0)">ProgMa</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-3">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse position-relative" id="navbar-ex-3">
                            <button class="btn ms-auto text-primary d-flex align-items-center" id="btnLoginOpt" type="button"><i class="bx bx-compass me-2"></i>Start Journey</button>
                            <ul class="dropdown-menu dropdown-menu-end" id="dropLogin" style="position: absolute; width: 250px; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 40px);">
                                <li>
                                    <a class="dropdown-item text-primary" href="<?= base_url('login/' . enVal('admin')) ?>"><i class="fas fa-user-cog me-2"></i><span class="text-secondary">Login as Admin</span></a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-primary" href="<?= base_url('login/' . enVal('teacher')) ?>"><i class="fas fa-user-tie me-2"></i><span class="text-secondary">Login as Teacher</span></a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-primary" href="<?= base_url('login/' . enVal('student')) ?>"><i class="fas fa-user me-2"></i><span class="text-secondary">Login as Student</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>