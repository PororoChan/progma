<?= $this->include('split/v_header') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users fs-5 text-primary me-2"></i>
                    <span class="fw-semibold fs-5">Data <span class="border-bottom border-primary">User</span></span>
                </div>
                <button class="btn btn-sm btn-primary d-flex align-items-center rounded-pill" id="btn-useradd">
                    <i class="bx bx-user-plus me-2"></i>
                    <span class="fw-normal fs-7">Add User</span>
                </button>
            </div>
            <hr class="m-0 my-2">
            <div class="table-responsive fs-6set">
                <table class="table table-sm table-responsive table-hover table-striped table-bordered" id="table-master">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Fullname</td>
                            <td>Gender</td>
                            <td>Address</td>
                            <td>Username</td>
                            <td>Roles</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
                <tbody>
                </tbody>
            </div>
        </div>
    </div>
</div>
<?= $this->include('split/v_footer') ?>