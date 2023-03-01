<?= $this->include('split/v_header') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bx bxs-user-badge fs-5 text-primary me-2"></i>
                    <span class="fw-semibold fs-5">Data <span class="border-bottom border-primary">Role</span></span>
                </div>
                <button class="btn btn-sm btn-primary d-flex align-items-center rounded-pill" id="btn-addrole">
                    <i class="bx bx-plus me-2"></i>
                    <span class="fw-normal fs-7">Add Role</span>
                </button>
            </div>
            <hr class="m-0 my-2">
            <div class="table-responsive fs-6set">
                <table class="table table-sm table-responsive table-hover table-striped table-bordered" id="table-master">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Rolename</td>
                            <td>Created At</td>
                            <td>Created By</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('split/v_footer') ?>