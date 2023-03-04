<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= $this->include('split/v_import') ?>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card px-3 py-2">
                    <div class="card-body">
                        <!-- <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder"></span>
                            </a>
                        </div> -->
                        <h4 class="mb-2">Welcome to ProgMa!</h4>
                        <p class="mb-4">Log In to use <span class="text-primary">Project Guidande Management</span> Features</p>
                        <form id="form-login" class="mb-3">
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter your username" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <!-- <a href="#">
                                        <small>Forgot Password?</small>
                                    </a> -->
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" aria-describedby="password" />
                                </div>
                                <div class="d-flex justify-content-start mt-2">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="showPass" role="switch">
                                        <label class="form-check-label fs-7">Show Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" id="btn-login">Log in</button>
                            </div>
                        </form>

                        <!-- <p class="text-center fs-7"> -->
                        <!-- <span>For Student?</span> -->
                        <!-- <a href="">
                                <span>Register here as student</span>
                            </a> -->
                        <!-- </p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?= $this->include('split/v_component') ?>
<?= $this->include('split/script') ?>
<script>
    function resetForm() {
        $('#form-login')[0].reset();
        $('#uname').focus();
    }

    function loginAuth() {
        var ic = `<i class='bx bx-loader-alt fs-4 bx-spin'></i>`;
        $('#btn-login').html(ic);
        $('#btn-login').attr('disabled', true);
        var link = '<?= base_url('auth') ?>',
            uname = $('#uname').val(),
            pass = $('#password').val();

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                username: uname,
                password: pass,
            },
            success: function(res) {
                if (res.success == 1) {
                    let icon = 'fas fa-user';
                    if (res.role == 1) {
                        icon = 'fas fa-users-cog';
                    } else if (res.role == 2) {
                        icon = 'fas fa-user-tie';
                    } else if (res.role == 3) {
                        icon = 'fas fa-users';
                    }
                    basicToast('bg-success', res.msg, icon);
                    setTimeout(() => {
                        window.location.href = '<?= base_url('dashboard') ?>';
                    }, 1500);
                } else {
                    basicToast('bg-warning', res.msg, 'bx bx-error');
                    resetForm();
                }
                $('#btn-login').html('Log in');
                $('#btn-login').removeAttr('disabled');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                basicToast('bg-danger', thrownError, 'bx bx-error');
                $('#btn-login').html('Log in');
                $('#btn-login').removeAttr('disabled');
            }
        })
    }

    $(document).ready(function() {
        $('#showPass').change(function() {
            if ($(this).is(':checked')) {
                $('input#password').attr('type', 'text');
            } else {
                $('input#password').attr('type', 'password');
            }
        })

        $('#btn-login').click(function(e) {
            e.preventDefault();
            loginAuth();
        })
        $('#form-login').submit(function(e) {
            e.preventDefault();
            loginAuth();
        })
    })
</script>