<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
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
            </li>
        </ul>
    </div>
</nav>