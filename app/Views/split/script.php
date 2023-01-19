<script>
    function resetBasicToast(status, icon) {
        $('#bToast').removeClass(status);
        $('#btoast-icon').removeClass(icon);
    }

    function basicToast(status, message, icon) {
        var bToast = document.querySelector('.toast.btoast');
        var toast = new bootstrap.Toast(bToast);
        $('#bToast').addClass(status);
        $('#btoast-msg').html(message);
        $('#btoast-icon').addClass(icon);
        toast.show();
        setTimeout(() => {
            toast.hide();
            setTimeout(() => {
                resetBasicToast(status, icon);
            }, 150);
        }, 1500);
    }

    function logoutUser() {
        $.ajax({
            url: '<?= base_url('logout') ?>',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                if (res.success == 1) {
                    basicToast('bg-success', res.msg, 'bx bx-loader-alt bx-spin');
                } else {
                    basicToast('bg-warning', res.msg, 'bx bx-error');
                }
                setTimeout(() => {
                    window.location.href = '<?= base_url('login') ?>'
                }, 1500);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                basicToast('bg-danger', thrownError, 'bx bxs-error');
            }
        })
    }

    $(document).ready(function() {
        $('#btn-logout').click(function() {
            logoutUser();
        })
    })
</script>