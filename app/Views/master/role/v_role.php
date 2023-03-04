<?= $this->include('split/v_header') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bx bxs-user-badge fs-5 text-primary me-2"></i>
                    <span class="fw-semibold fs-5">Data <span class="border-bottom border-primary">Role</span></span>
                </div>
            </div>
            <hr class="m-0 my-2">
            <div class="my-1 p-0">
                <div class="row">
                    <?php foreach ($roles->getAllRole() as $role) : ?>
                        <?php
                        $icons = iconRole($role['rolename']);
                        ?>
                        <div class="col-md-4">
                            <div class="card btn-outline-primary shadow p-3">
                                <div class="d-flex align-items-center">
                                    <i class="<?= $icons ?> fs-6 me-2"></i>
                                    <span class="fw-semibold fs-6"><?= ucfirst($role['rolename']) ?></span>
                                </div>
                                <div class="mt-4">
                                    <span class="fs-4 fw-bolder"><?= $datas->getCountRoleByRoleid($role['roleid']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('split/v_footer') ?>