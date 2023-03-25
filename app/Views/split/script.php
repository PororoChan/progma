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
                    window.location.href = '<?= base_url('/') ?>'
                }, 1500);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                basicToast('bg-danger', thrownError, 'bx bxs-error');
            }
        })
    }

    // menampilkan modal crud semua master
    function crudModal(title, size, icon, id, btn, link) {
        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(res) {
                if (id != "") {
                    $('#ids').val(id);
                }
                $('#linkData').val(link);
                $('#crudSize').addClass(size);
                $('#crudIcon').addClass(icon);
                $('#crudTitle').text(title);
                $('#crudBtn').html(btn);
                $('#crudForm').html(res.view);
                $('#crudModal').modal('show')
                setTimeout(() => {
                    $('#crudForm form input[type=text]').first().focus();
                }, 500);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                basicToast('bg-danger', thrownError, 'bx bxs-error');
            }
        })
    }

    function displayToken(title, size, icon, token) {
        $('#smSize').addClass(size);
        $('#smIcon').addClass(icon);
        $('#smTitle').text(title);
        $('#smToken').val(token);
        $('#smAlert').modal('show');
    }

    function copyToken() {
        $('#smToken').select();
        document.execCommand('copy');
        basicToast('bg-success', 'Token Copied', 'bx bx-check');
    }

    function delModal(title, size, icon, id, btn, msg, link) {
        $('#delSize').addClass(size);
        $('#linkDel').val(link);
        $('#delId').val(id);
        $('#delIcon').addClass(icon);
        $('#delTitle').text(title);
        $('#delMsg').text(msg);
        $('#delBtn').html(btn);
        $('#delModal').modal('show');
    }


    $(document).ready(function() {
        AOS.init();
        $('#btn-logout').click(function() {
            logoutUser();
        })

        $('#delBtn').click(function() {
            var link = $('#linkDel').val(),
                id = $('#delId').val();

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(res) {
                    if (res.success == 1) {
                        basicToast('bg-success', res.msg, 'bx bx-check');
                        mstable.ajax.reload();
                        $('#delModal').modal('toggle');
                    } else {
                        basicToast('bg-warning', res.msg, 'bx bxs-error');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    basicToast('bg-danger', thrownError, 'bx bxs-error');
                }
            })
        })

        // active navbar
        var linkWeb = window.location.href;
        $('.menu-inner .menu-item .menu-link').each(function(e) {
            var linkThis = $(this).attr('href').split('/').pop();
            $(this).parent().toggleClass('active', linkWeb.includes(linkThis));
        })

        // Trigger login option on button hover
        $('#btnLoginOpt').click(function() {
            $('#dropLogin').toggleClass('show');
        })

        $('#dropLogin li a').hover(
            function() {
                $(this).find('span').removeClass('text-secondary');
                $(this).find('span').addClass('text-primary');
            },
            function() {
                $(this).find('span').removeClass('text-primary');
                $(this).find('span').addClass('text-secondary');
            }
        )
    })

    // datatable-master
    var mstable = $('#table-master').DataTable({
        serverSide: true,
        destroy: true,
        autoWidth: false,
        ajax: {
            url: '<?= current_url(true) ?>/table',
            type: 'post',
            data: function(param) {
                return param;
            }
        }
    })
</script>