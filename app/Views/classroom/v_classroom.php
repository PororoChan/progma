<?= $this->include('split/v_header') ?>
<style>
    .card-head {
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .card-pro {
        width: 50px;
        height: 50px;
        position: absolute;
        top: 40%;
        right: 4%;
    }

    .card-tgl {
        border-radius: 2px;
        width: max-content;
        max-height: 20px;
        position: absolute;
        left: 2%;
        top: 2%;
    }
</style>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <span class="fw-semibold text-secondary fs-6set">Your Class</span>
                <div class="d-flex">
                    <?php if (session()->get('role') == 2) : ?>
                        <button class="btn btn-sm btn-success me-2" onclick="return crudModal('Add Your Class', 'modal-md', 'bx bxs-school', '', 'Create Class', '<?= base_url('room/form') ?>')"><i class="bx bx-plus-circle me-2"></i>Make Class</button>
                    <?php endif; ?>
                    <button class="btn btn-sm btn-outline-primary me-2"><i class="bx bx-sort-a-z"></i></button>
                    <button class="btn btn-sm btn-outline-primary"><i class="bx bx-layout"></i></button>
                </div>
            </div>
            <div class="col-12 mt-3 overflow-auto" style="max-height: 480px;">
                <div class="row g-3 mb-2">
                    <?php if (!empty($datac)) : ?>
                        <?php foreach ($datac as $dt) : ?>
                            <a href="<?= base_url('room/d/' . enVal($dt['classid'])) ?>" class="col-3 text-secondary">
                                <div class="card shadow-sm" style="min-height: 150px !important;">
                                    <?php if (session()->get('role') == 2) : ?>
                                        <div class="card bg-white card-tgl py-1 px-1">
                                            <span class="fs-8 text-dark">Created : <?= date('d F Y', strtotime($dt['createddate'])) ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (substr($dt['backimg'], 0, 4) == 'rgba') : ?>
                                        <div class="card-head" style="min-height: 85px !important; background-color: <?= $dt['backimg'] ?>;">
                                        </div>
                                    <?php else : ?>
                                        <div class="card-head" style="min-height: 85px !important; background-image: url(<?= base_url('public/assets/img/card/' . $dt['backimg']) ?>);">
                                        </div>
                                    <?php endif; ?>
                                    <div class="h-50 p-2">
                                        <span class="fs-6set text-dark"><?= $dt['classtitle'] ?></span><br>
                                        <?php if (session()->get('role') == 3) : ?>
                                            <img class="card-pro rounded-circle shadow-sm" src="<?= base_url('public/assets/img/avatar/avatar.png') ?>" alt="card-pro">
                                            <span class="fs-6set"><?= $dt['createdby'] ?></span><br>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="d-flex justify-content-center">
                            <span class="text-dark fw-semibold fs-6">There is no Classroom in here...</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('split/v_footer') ?>
<script>
    $('#crudBtn').click(function() {
        var ishidden = 0,
            link = '<?= base_url('room/add') ?>',
            fd = new FormData(),
            title = $('#ctitle').val(),
            tokens = $('#ctoken').val(),
            bmg = $('#bimg').prop('files')[0],
            isact = 0;

        if ($('#ishid').is(':checked')) {
            ishidden = 1;
        }
        if ($('#isact').is(':checked')) {
            isact = 1;
        }

        fd.append('ctoken', tokens);
        fd.append('ctitle', title);
        fd.append('bimg', bmg);
        fd.append('ishidden', ishidden);
        fd.append('isactive', isact);

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: fd,
            success: function(res) {

            },
            error: function(xhr, ajaxOptions, thrownError) {
                basicToast('bg-danger', thrownError, 'bx bxs-error');
            }
        })
    })
</script>