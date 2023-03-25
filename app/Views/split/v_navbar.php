<style>
    .btn-bell i {
        color: #7E9CD0;
    }

    .btn-bell:hover i {
        color: #696CFF;
    }
</style>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <?php if (!empty(session()->get('classid'))) : ?>
                <div class="d-flex text-center align-items-center">
                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="bx bx-menu"></i>
                    </button>
                    <div class="vr mx-2 text-secondary"></div>
                    <i class="bx bxs-dashboard text-primary me-2"></i><span class="fw-semibold text-dark fs-6"><?= (isset($data['classtitle']) ? ucwords($data['classtitle']) : 'Class with No Name') ?></span>
                </div>
            <?php else : ?>
                <?php if (session()->get('role') == 1) : ?>
                    <div class="nav-item d-flex align-items-center">
                        <i class="bx bx-search fs-4 lh-0"></i>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                    </div>
                <?php else : ?>
                    <a class="nav-item d-flex align-items-center" href="<?= base_url('dashboard') ?>">
                        <div class="row text-center">
                            <div class="col-12">
                                <i class="bx bxs-home"></i>
                            </div>
                            <div class="col-12">
                                <span class="fw-normal fs-7">Home</span>
                            </div>
                        </div>
                    </a>
                    <a class="nav-item d-flex align-items-center" href="<?= base_url('room') ?>">
                        <div class="row text-center">
                            <div class="col-12">
                                <i class="bx bxs-school"></i>
                            </div>
                            <div class="col-12">
                                <span class="fw-normal fs-7">Classroom</span>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <div class="d-flex align-items-center">
                    <?php if (session()->get('role') != 1) : ?>
                        <a class="btn-bell" href="<?= base_url('notification/' . enVal(session()->get('userid'))) ?>">
                            <i class="bx bxs-bell"></i>
                        </a>
                    <?php endif; ?>
                    <a class="nav-link dropdown-toggle hide-arrow ms-3" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <?php
                            $base = base_url('public/assets/img/avatar');
                            $baseProfile = base_url('public/assets/img/profiles');
                            $rolename = '';

                            $role = session()->get('role');
                            if ($role == 1) {
                                $rolename = 'Admin';
                            } else if ($role == 2) {
                                $rolename = 'Teacher';
                            } else if ($role == 3) {
                                $rolename = 'Student';
                            }
                            $checkHasPhoto = $datas->getOne(session()->get('userid'));
                            if ($checkHasPhoto['userdata']) {
                                $split = json_decode($checkHasPhoto['userdata']);
                                if (empty($split->profile)) {
                                    $gambar = $base . '/avatar.png';
                                } else {
                                    $gambar = $baseProfile . '/' . $split->profile;
                                }
                            } else {
                                $gambar = $base . '/avatar.png';
                            }
                            ?>
                            <img src="<?= $gambar ?>" alt class="w-px-40 h-auto rounded-circle shadow-sm" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('myprofile') ?>">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="<?= $gambar ?>" alt class="w-px-40 h-auto rounded-circle shadow-sm" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 mt-0">
                                        <span class="fw-semibold d-block"><?= session()->get('name') ?></span>
                                        <small class="text-muted text-primary"><?= $rolename ?></small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" id="btn-logout" href="javascript:void(0)">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Offcanvas List Class -->
<div class="offcanvas offcanvas-start" style="max-width: 325px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header d-flex justify-content-between align-items-start">
        <div>
            <h5 class="offcanvas-title fs-5" id="offcanvasExampleLabel"><?= (isset($data['classtitle']) ? ucwords($data['classtitle']) : '') ?></h5>
            <span class="fw-normal text-dark fs-7">Created by <span class="fw-semibold text-primary text-decoration-underline"><?= (isset($data['fullname']) ? ucwords($data['fullname']) : '') ?></span></span>
        </div>
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bx bx-menu"></i></button>
    </div>
    <hr class="mb-0">
    <div class="offcanvas-body p-0">
        <div class="list-group my-2 mx-0" style="border-radius: none !important;">
            <a href="<?= base_url('b/room') ?>" class="list-group-item list-group-item-action">
                <i class="bx bxs-school me-2"></i><span class="fw-normal fs-7 text-dark">Classroom</span>
            </a>
        </div>
        <hr class="my-0">
        <div class="my-3 ms-3">
            <span class="fw-semibold fs-6set text-secondary">Active Class</span>
        </div>
        <div class="list-group mx-0 side-act" style="border-radius: none !important;">
            <?php
            if (isset($listclass)) :
                foreach ($listclass as $ls) : ?>
                    <a href="<?= base_url('room/d/' . enVal($ls['classid'])) ?>" class="d-flex align-items-center list-group-item list-group-item-action">
                        <?php if (substr($ls['backimg'], 0, 4) == 'rgba') : ?>
                            <div class="me-2 rounded d-flex align-items-center justify-content-center" style="background-color: <?= $ls['backimg'] ?>; width: 35px; height: 35px;">
                                <span class="fw-semibold fs-6 text-white"><?= strtoupper(substr($ls['classtitle'], 0, 1)) ?></span>
                            </div>
                        <?php else : ?>
                            <div class="me-2 rounded d-flex align-items-center justify-content-center" style="background-color: <?= genColor() ?>; width: 35px; height: 35px;">
                                <span class="fw-semibold fs-6 text-white"><?= strtoupper(substr($ls['classtitle'], 0, 1)) ?></span>
                            </div>
                        <?php endif; ?>
                        <span class="fw-normal fs-7 text-secondary"><?= ucwords($ls['classtitle']) ?></span>
                    </a>
            <?php endforeach;
            endif; ?>
        </div>
        <hr class="my-0 mt-3">
        <div class="my-3">
            <div class="list-group mx-0 side-act" style="border-radius: none !important;">
                <div class="d-flex justify-content-between">
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                        <span class="fw-semibold fs-6set text-secondary">Hidden Class</span>
                        <span class="badge bg-danger"><?= (isset($listhidden) ? count($listhidden) : 'NaN') ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>