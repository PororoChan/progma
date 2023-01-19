<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= $this->include('split/v_import') ?>
    <style>
        .margin-x {
            margin-top: 3rem;
            margin-left: 22rem;
            margin-right: 22rem;
        }

        .margin-x::before {
            width: 148px;
            height: 148px;
            content: " ";
            position: absolute;
            top: 40px;
            right: 20rem;
            background-image: url("data:image/svg+xml,%3Csvg width='148px' height='148px' viewBox='0 0 148 148' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M355,144 C356.104569,144 357,144.895431 357,146 C357,147.104569 356.104569,148 355,148 C353.895431,148 353,147.104569 353,146 C353,144.895431 353.895431,144 355,144 Z M382,144 C383.104569,144 384,144.895431 384,146 C384,147.104569 383.104569,148 382,148 C380.895431,148 380,147.104569 380,146 C380,144.895431 380.895431,144 382,144 Z M412,144 C413.104569,144 414,144.895431 414,146 C414,147.104569 413.104569,148 412,148 C410.895431,148 410,147.104569 410,146 C410,144.895431 410.895431,144 412,144 Z M442,144 C443.104569,144 444,144.895431 444,146 C444,147.104569 443.104569,148 442,148 C440.895431,148 440,147.104569 440,146 C440,144.895431 440.895431,144 442,144 Z M472,144 C473.104569,144 474,144.895431 474,146 C474,147.104569 473.104569,148 472,148 C470.895431,148 470,147.104569 470,146 C470,144.895431 470.895431,144 472,144 Z M499,144 C500.104569,144 501,144.895431 501,146 C501,147.104569 500.104569,148 499,148 C497.895431,148 497,147.104569 497,146 C497,144.895431 497.895431,144 499,144 Z M355,117 C356.104569,117 357,117.895431 357,119 C357,120.104569 356.104569,121 355,121 C353.895431,121 353,120.104569 353,119 C353,117.895431 353.895431,117 355,117 Z M382,117 C383.104569,117 384,117.895431 384,119 C384,120.104569 383.104569,121 382,121 C380.895431,121 380,120.104569 380,119 C380,117.895431 380.895431,117 382,117 Z M412,117 C413.104569,117 414,117.895431 414,119 C414,120.104569 413.104569,121 412,121 C410.895431,121 410,120.104569 410,119 C410,117.895431 410.895431,117 412,117 Z M442,117 C443.104569,117 444,117.895431 444,119 C444,120.104569 443.104569,121 442,121 C440.895431,121 440,120.104569 440,119 C440,117.895431 440.895431,117 442,117 Z M472,117 C473.104569,117 474,117.895431 474,119 C474,120.104569 473.104569,121 472,121 C470.895431,121 470,120.104569 470,119 C470,117.895431 470.895431,117 472,117 Z M499,117 C500.104569,117 501,117.895431 501,119 C501,120.104569 500.104569,121 499,121 C497.895431,121 497,120.104569 497,119 C497,117.895431 497.895431,117 499,117 Z M355,87 C356.104569,87 357,87.8954305 357,89 C357,90.1045695 356.104569,91 355,91 C353.895431,91 353,90.1045695 353,89 C353,87.8954305 353.895431,87 355,87 Z M382,87 C383.104569,87 384,87.8954305 384,89 C384,90.1045695 383.104569,91 382,91 C380.895431,91 380,90.1045695 380,89 C380,87.8954305 380.895431,87 382,87 Z M412,87 C413.104569,87 414,87.8954305 414,89 C414,90.1045695 413.104569,91 412,91 C410.895431,91 410,90.1045695 410,89 C410,87.8954305 410.895431,87 412,87 Z M442,87 C443.104569,87 444,87.8954305 444,89 C444,90.1045695 443.104569,91 442,91 C440.895431,91 440,90.1045695 440,89 C440,87.8954305 440.895431,87 442,87 Z M472,87 C473.104569,87 474,87.8954305 474,89 C474,90.1045695 473.104569,91 472,91 C470.895431,91 470,90.1045695 470,89 C470,87.8954305 470.895431,87 472,87 Z M499,87 C500.104569,87 501,87.8954305 501,89 C501,90.1045695 500.104569,91 499,91 C497.895431,91 497,90.1045695 497,89 C497,87.8954305 497.895431,87 499,87 Z M355,57 C356.104569,57 357,57.8954305 357,59 C357,60.1045695 356.104569,61 355,61 C353.895431,61 353,60.1045695 353,59 C353,57.8954305 353.895431,57 355,57 Z M472,57 C473.104569,57 474,57.8954305 474,59 C474,60.1045695 473.104569,61 472,61 C470.895431,61 470,60.1045695 470,59 C470,57.8954305 470.895431,57 472,57 Z M412,57 C413.104569,57 414,57.8954305 414,59 C414,60.1045695 413.104569,61 412,61 C410.895431,61 410,60.1045695 410,59 C410,57.8954305 410.895431,57 412,57 Z M499,57 C500.104569,57 501,57.8954305 501,59 C501,60.1045695 500.104569,61 499,61 C497.895431,61 497,60.1045695 497,59 C497,57.8954305 497.895431,57 499,57 Z M382,57 C383.104569,57 384,57.8954305 384,59 C384,60.1045695 383.104569,61 382,61 C380.895431,61 380,60.1045695 380,59 C380,57.8954305 380.895431,57 382,57 Z M442,57 C443.104569,57 444,57.8954305 444,59 C444,60.1045695 443.104569,61 442,61 C440.895431,61 440,60.1045695 440,59 C440,57.8954305 440.895431,57 442,57 Z M355,27 C356.104569,27 357,27.8954305 357,29 C357,30.1045695 356.104569,31 355,31 C353.895431,31 353,30.1045695 353,29 C353,27.8954305 353.895431,27 355,27 Z M382,27 C383.104569,27 384,27.8954305 384,29 C384,30.1045695 383.104569,31 382,31 C380.895431,31 380,30.1045695 380,29 C380,27.8954305 380.895431,27 382,27 Z M412,27 C413.104569,27 414,27.8954305 414,29 C414,30.1045695 413.104569,31 412,31 C410.895431,31 410,30.1045695 410,29 C410,27.8954305 410.895431,27 412,27 Z M442,27 C443.104569,27 444,27.8954305 444,29 C444,30.1045695 443.104569,31 442,31 C440.895431,31 440,30.1045695 440,29 C440,27.8954305 440.895431,27 442,27 Z M472,27 C473.104569,27 474,27.8954305 474,29 C474,30.1045695 473.104569,31 472,31 C470.895431,31 470,30.1045695 470,29 C470,27.8954305 470.895431,27 472,27 Z M499,27 C500.104569,27 501,27.8954305 501,29 C501,30.1045695 500.104569,31 499,31 C497.895431,31 497,30.1045695 497,29 C497,27.8954305 497.895431,27 499,27 Z M355,0 C356.104569,0 357,0.8954305 357,2 C357,3.1045695 356.104569,4 355,4 C353.895431,4 353,3.1045695 353,2 C353,0.8954305 353.895431,0 355,0 Z M382,0 C383.104569,0 384,0.8954305 384,2 C384,3.1045695 383.104569,4 382,4 C380.895431,4 380,3.1045695 380,2 C380,0.8954305 380.895431,0 382,0 Z M412,0 C413.104569,0 414,0.8954305 414,2 C414,3.1045695 413.104569,4 412,4 C410.895431,4 410,3.1045695 410,2 C410,0.8954305 410.895431,0 412,0 Z M442,0 C443.104569,0 444,0.8954305 444,2 C444,3.1045695 443.104569,4 442,4 C440.895431,4 440,3.1045695 440,2 C440,0.8954305 440.895431,0 442,0 Z M472,0 C473.104569,0 474,0.8954305 474,2 C474,3.1045695 473.104569,4 472,4 C470.895431,4 470,3.1045695 470,2 C470,0.8954305 470.895431,0 472,0 Z M499,0 C500.104569,0 501,0.8954305 501,2 C501,3.1045695 500.104569,4 499,4 C497.895431,4 497,3.1045695 497,2 C497,0.8954305 497.895431,0 499,0 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='📝-Pages' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Login---V2' transform='translate(-822.000000, -197.000000)'%3E%3Cg id='top-illustration' transform='translate(469.000000, 197.000000)'%3E%3Cuse fill='%23696cff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.6' fill='%23FFFFFF' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>

<body>
    <div class="container-xxl">
        <div class="margin-x authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card px-3 py-2">
                    <div class="card-body">
                        <!-- <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder"></span>
                            </a>
                        </div> -->
                        <h4 class="mb-2">Easy Guidance starts here</h4>
                        <p class="mb-4">Register for making job task guidance easier!</p>

                        <form id="form-student-register" class="mb-3" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="@ex: Thanos Mad Titan" autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input me-2" value="0" name="genderName">
                                        <i class="bx bx-male"></i><label class="form-check-label fs-7">Male</label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <input type="radio" class="form-check-input me-2" value="1" name="genderName">
                                        <i class="bx bx-female"></i><label class="form-check-label fs-7">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="3" placeholder="@ex: Jl.Werkudara . . ."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Short Bio</label>
                                <textarea name="sbio" id="sbio" rows="3" class="form-control" placeholder="@ex: I am a Student"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo Profile</label>
                                <input type="file" name="pprofile" id="pprofile" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Birth Date</label>
                                <input type="date" name="bdate" id="bdate" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="uname" id="uname" class="form-control" placeholder="@ex: myusername08">
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" id="confirm" class="form-control" name="confirm" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="showPass" role="switch">
                                    <label class="form-check-label fs-7">Show Password</label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100" id="btn-regist-student">Register</button>
                        </form>

                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="<?= base_url('login') ?>">
                                <span>Log in</span>
                            </a>
                        </p>
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
    let gender = '';

    function resetForm() {
        $('#form-student-register')[0].reset();
    }

    function registerStudent() {
        var ic = `<i class='bx bx-loader-alt fs-4 bx-spin'></i>`;
        $('#btn-regist-student').html(ic);
        $('#btn-regist-student').attr('disabled', true);
        var link = '<?= base_url('register/student/add') ?>',
            form = new FormData();
        form.append('fullname', $('#fullname').val());
        form.append('gender', gender);
        form.append('address', $('#address').val());
        form.append('bio', $('#sbio').val());
        form.append('profile', $('#pprofile').prop('files')[0]);
        form.append('birth', $('#bdate').val());
        form.append('username', $('#uname').val());
        form.append('password', $('#password').val());
        form.append('confirm', $('#confirm').val());

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: form,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.success == 1) {
                    basicToast('bg-success', res.msg, 'bx bxs-user-check');
                    setTimeout(() => {
                        window.location.href = '<?= base_url('login') ?>';
                    }, 1500);
                } else {
                    basicToast('bg-warning', res.msg, 'bx bxs-info-circle');
                    resetForm();
                }
                if (res.error) {
                    console.log(res.error);
                }
                $('#btn-regist-student').html('Register');
                $('#btn-regist-student').removeAttr('disabled');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                basicToast('bg-danger', thrownError, 'bx bx-error');
            }
        })
    }

    $(document).ready(function() {
        $('[name=genderName]').change(function() {
            if ($(this).val() == 0) {
                gender = 'male';
            } else if ($(this).val() == 1) {
                gender = 'female';
            }
        })
        $('#showPass').change(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
                $('#confirm').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
                $('#confirm').attr('type', 'password');
            }
        })
        $('#form-register-student').submit(function(e) {
            e.preventDefault();
            registerStudent();
        })
        $('#btn-regist-student').click(function(e) {
            e.preventDefault();
            registerStudent();
        })
    })
</script>