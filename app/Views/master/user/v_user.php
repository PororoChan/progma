<?= $this->include('split/v_header') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users fs-5 text-primary me-2"></i>
                    <span class="fw-semibold fs-5">Data <span class="border-bottom border-primary">User</span></span>
                </div>
                <button class="btn btn-sm btn-primary d-flex align-items-center rounded-pill" onclick="return crudModal('Add New User', 'modal-md','bx bx-user-plus', '', 'Save', '<?= base_url('user/form') ?>')" id="btn-useradd">
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
<script>
    function proses(link, form) {
        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: form,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.error) {
                    console.log(res.error);
                }
                if (res.success == 1) {
                    basicToast('bg-success', res.msg, 'bx bx-check');
                    mstable.ajax.reload();
                    $('#user-form')[0].reset();
                    $('#crudModal').modal('toggle');
                } else {
                    basicToast('bg-warning', res.msg, 'bx bxs-error');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                basicToast('bg-danger', thrownError, 'bx bxs-error');
            }
        })
    }
    $('#crudBtn').click(function() {
        // Radio button gender
        var genderStr = '',
            ftype = $('#ftype').val(),
            link = '<?= base_url('user/add') ?>',
            genderNum = $('input[name=gender]:checked').val(),
            form = new FormData();

        if (genderNum == 1) {
            genderStr = "male";
        } else {
            genderStr = "female";
        }

        // Append semua data ke dalam formData
        form.append('ftype', ftype);
        form.append('userid', $('#userid').val());
        form.append('fullname', $('#fullname').val())
        form.append('gender', genderStr);
        form.append('address', $('#address').val())
        form.append('bio', $('#bio').val())
        form.append('profile', $('#profiles').prop('files')[0])
        form.append('bd', $('#bd').val())
        form.append('role', $('#roles').val())
        form.append('username', $('#uname').val())
        form.append('password', $('#password').val())
        form.append('confirm', $('#confirm').val())

        // Cek form type add / edit
        if (ftype == 'edit') {
            link = '<?= base_url('user/update') ?>';
        }
        // proses tambah / update
        proses(link, form);
    })
</script>