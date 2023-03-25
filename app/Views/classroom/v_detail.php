<?= $this->include('split/v_header') ?>
<style>
    .chead {
        min-height: 250px;
    }
</style>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="row gx-4 mx-5">
                <div class="col-12">
                    <?php
                    $img = "";
                    if (substr($data['backimg'], 0, 4) == 'rgba') {
                        $img = 'background-color: ' . $data['backimg'];
                    } else {
                        $img = 'background-image: url(' . base_url(CASSET . $data['backimg']) . '); background-position: center; background-size: cover;';
                    } ?>
                    <div class="card chead" style="<?= $img ?>">
                        <div class="d-flex justify-content-end mt-3 me-4">
                            <button class="btn btn-sm" style="background-color: transparent; border: none;"><i class="bx bx-list-ul text-white"></i></button>
                            <button class="btn btn-sm" style="background-color: transparent; border: none;"><i class="bx bxs-user-detail text-white"></i></button>
                        </div>
                        <div class="d-flex justify-content-between ms-4 me-4 mt-auto mb-3">
                            <span class="text-white fw-bold fs-3"><?= ucwords($data['classtitle']) ?></span>
                            <button class="btn btn-sm rounded-circle" style="background-color: transparent; border: none;" onclick="return displayToken('Token for <?= ucwords($data['classtitle']) ?>', 'modal-sm', 'bx bx-key', '<?= $data['token'] ?>')">
                                <i class="bx bx-info-circle text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="my-2"></div>
                <div class="col-3">
                    <div class="card border bg-white p-2">
                        <div class="d-flex">
                            <span class="fw-normal text-dark fs-6set">Ongoing Tasks</span>
                        </div>
                        <div class="list-group my-1" style="border: none; max-height: 200px; overflow: auto;">
                            <?php for ($t = 0; $t < 5; $t++) : ?>
                                <a href="#" class="list-group-item list-group-item-action p-0 ps-1 py-1 rounded">
                                    <span class="fw-normal text-dark fs-7set">Tugas Kimia menggambar Unsur Biloks.</span><br>
                                    <span class="fw-normal text-secondary fs-8">Deadline: 7 Mei 2023 12:45</span>
                                </a>
                            <?php endfor; ?>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('tasks/u/' . enVal(session()->get('userid'))) ?>" class="text-primary fs-7">See all tasks</a>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <style>
                        input[name=comment] {
                            border: none;
                            border-bottom: 0.2px solid #f2f2f2;
                            border-radius: 0px 0px 0px 0px;
                        }
                    </style>
                    <div class="card shadow-sm bg-white py-2 px-3">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('public/assets/img/avatar/avatar.png') ?>" class="rounded-circle" style="width: 45px; height: 45px;" alt="comment-avt">
                            <input type="text" name="comment" id="comment" class="form-control ms-2" placeholder="Place your comment here">
                        </div>
                    </div>
                    <?php for ($o = 0; $o <= 5; $o++) : ?>
                        <a href="#" class="text-secondary">
                            <div class="card shadow-sm border bg-white py-3 my-2 px-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="btn btn-sm bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                            <i class="bx bx-book text-white"></i>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col-12 d-flex align-items-end">
                                                <span class="fw-semibold text-secondary mb-0 fs-7">Pak Slamet Memposting Ini</span>
                                            </div>
                                            <div class="col-12 d-flex align-items-start">
                                                <span class="fw-normal text-dark fs-8 mt-0"><?= date('d F') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm" style="background-color: transparent; border: none;">
                                        <i class="bx bx-dots-vertical-rounded text-dark"></i></button>
                                </div>
                            </div>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('split/v_footer') ?>