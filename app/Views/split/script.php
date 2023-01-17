<script>
    $(document).ready(function() {})

    function basicToast(status, message, icon) {
        var bToast = document.querySelector('.toast.btoast');
        var toast = new bootstrap.Toast(bToast);
        $('#bToast').addClass(status);
        $('#btoast-msg').html(message);
        $('#btoast-icon').addClass(icon);
        toast.show();
        setTimeout(() => {
            toast.hide();
        }, 1000);
    }
</script>