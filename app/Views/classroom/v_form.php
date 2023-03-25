<form id="form-class" method="POST">
    <!-- generate random token for each class -->
    <input type="hidden" name="ctoken" id="ctoken" value="<?= genToken(random_int(123456, 999999)) ?>">
    <div class="mb-3">
        <label class="form-label">Class Title</label>
        <input type="text" name="ctitle" id="ctitle" class="form-control" placeholder="@ex: Software Engineer Pt.4">
    </div>
    <div class="mb-3">
        <label class="form-label">Background Image</label>
        <input type="file" name="bimg" id="bimg" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label><br>
        <input type="checkbox" name="ishid" id="ishid" value="true" class="form-check-input me-2"> Is Hidden
        <input type="checkbox" name="isact" id="isact" value="true" class="form-check-input ms-3 me-2"> Is Active
    </div>
</form>