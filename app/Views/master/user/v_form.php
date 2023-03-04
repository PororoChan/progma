<?php
$gender = 0;
if ($ftype == 'edit') {
    if (isset($row['userdata'])) {
        $en = json_decode($row['userdata']);
        if ($en->gender == 'male') {
            $gender = 1;
        } else {
            $gender = 2;
        }
    }
}
?>
<form id="user-form">
    <?php if ($ftype == 'edit') : ?>
        <div class="d-flex align-items-center justify-content-center m-2">
            <?php if (isset($en->profile) && !empty($en->profile)) : ?>
                <img src="<?= base_url('public/assets/img/profiles/' . $en->profile) ?>" alt="profile-img" style="width: 120px; height: 120px;" class="rounded-circle border shadow-sm">
            <?php else : ?>
                <img src="<?= base_url('public/assets/img/avatar/avatar.png') ?>" alt="profile-img" style="width: 120px; height: 120px;" class="rounded-circle border shadow-sm">
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="profile-preview"></div>
    <div class="mb-3">
        <label class="form-label">Fullname</label><span class="text-danger ms-2"><?= ($ftype != 'edit' ? '*' : '') ?></span>
        <input type="text" name="fullname" id="fullname" class="form-control" value="<?= isset($row['fullname']) ? $row['fullname'] : '' ?>" placeholder="@ex: Rama Tut">
    </div>
    <input type="hidden" name="ftype" id="ftype" value="<?= $ftype ?>">
    <input type="hidden" name="userid" id="userid" value="<?= isset($row['userid']) ? enVal($row['userid']) : '' ?>">
    <div class="mb-3">
        <label class="form-label">Gender</label>
        <div class="radio-group d-flex">
            <div class="d-flex align-items-center me-2">
                <input type="radio" name="gender" class="form-check-input" value="1" <?= ($gender == 1 ? 'checked' : '') ?>>
                <i class="bx bx-male me-1"></i>
                <span>Male</span>
            </div>
            <div class="d-flex align-items-center">
                <input type="radio" name="gender" class="form-check-input" value="2" <?= ($gender == 2 ? 'checked' : '') ?>>
                <i class="bx bx-female me-1"></i>
                <span>Female</span>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" id="address" rows="3" class="form-control" placeholder="@ex: Jl. Perkutut No.2"><?= isset($en->address) ? $en->address : '' ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" id="bio" rows="3" class="form-control" placeholder="@ex: I am an Astronaut"><?= isset($en->bio) ? $en->bio : '' ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Profile</label>
        <input type="file" name="profiles" id="profiles" class="form-control">
        <?php if ($ftype == 'edit') : ?>
            <?php if (isset($en->profile) && !empty($en->profile)) : ?>
                <span class="fw-semibold mt-1 fs-7 text-info">Choose image if want to update photo profiles</span>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Birth Date</label>
        <?php
        $bdate = '1999-01-01';
        if (isset($row['birthdate'])) {
            $bdate = date('Y-m-d', strtotime($row['birthdate']));
        }
        ?>
        <input type="date" name="bd" id="bd" class="form-control" value="<?= $bdate ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Role</label><span class="text-danger ms-2"><?= ($ftype != 'edit' ? '*' : '') ?></span>
        <!-- select2 dari data roles -->
        <select name="roles" id="roles" class="form-control">
            <option></option>
            <?php if ($ftype == 'edit') : ?>
                <option value="<?= isset($row['role']) ? $row['role'] : '' ?>" selected><?= isset($rolename['rolename']) ? ucfirst($rolename['rolename']) : '' ?></option>
            <?php endif; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label><span class="text-danger ms-2"><?= ($ftype != 'edit' ? '*' : '') ?></span>
        <input type="text" name="uname" id="uname" class="form-control" placeholder="@ex: KangRamaTut99" value="<?= isset($row['username']) ? $row['username'] : '' ?>">
    </div>
    <?php if ($ftype != 'edit') : ?>
        <div class="mb-3">
            <label class="form-label">Password</label><span class="text-danger ms-2"><?= ($ftype != 'edit' ? '*' : '') ?></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label><span class="text-danger ms-2"><?= ($ftype != 'edit' ? '*' : '') ?></span>
            <input type="password" name="confirm" id="confirm" class="form-control" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">
        </div>
    <?php endif; ?>
</form>

<script>
    $('#roles').select2({
        dropdownParent: $('#user-form'),
        width: '100%',
        placeholder: 'Select User Roles',
        allowClear: true,
        minimumResultsForSearch: -1,
        ajax: {
            url: '<?= base_url('role/getRoles') ?>',
            dataType: 'json',
            data: function(param) {
                return {
                    search: param.term
                }
            },
            processResults: function(res) {
                return {
                    results: res
                }
            }
        }
    })
</script>