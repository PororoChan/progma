<style>
    a.menu-link {
        font-size: 14px !important;
    }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= base_url('/dashboard') ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 mb-2">
                <div class="row gy-0">
                    <div class="col-12">
                        <span class="text-primary">ProgMa</span>
                    </div>
                    <div class="col-12">
                        <span class="fs-7 fw-normal text-secondary">Project Guidance Management</span>
                    </div>
                </div>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="<?= base_url('/dashboard') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-pie-chart-alt-2"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <?php if (session()->get('role') == 1) : ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-bar-chart-alt-2"></i>
                    <div data-i18n="Layouts">Master</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="<?= base_url('user') ?>" class="menu-link">
                            <div data-i18n="Without menu">User</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('role') ?>" class="menu-link">
                            <div data-i18n="Without menu">Role</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('classroom') ?>" class="menu-link">
                            <div data-i18n="Without menu">Active Class</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('tasklist') ?>" class="menu-link">
                            <div data-i18n="Without menu">Task List</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-without-menu.html" class="menu-link">
                            <div data-i18n="Without menu">File</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-without-menu.html" class="menu-link">
                            <div data-i18n="Without menu">History</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</aside>