<!-- Basic Alert Toast -->
<div id="bToast" class="toast btoast align-items-center position-fixed top-0 end-0 m-2 text-bg-primary border-0" style="z-index: 99999;" role="alert" data-bs-autohide="false" aria-live="assertive" aria-atomic="true">
    <div class="d-flex align-items-center justify-content-start ps-4 fs-6">
        <i id="btoast-icon"></i>
        <div class="toast-body ps-2" id="btoast-msg">
            <!-- Message -->
        </div>
    </div>
</div>

<!-- Modal CRUD Master -->
<div class="modal fade" id="crudModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="crudSize">
        <div class="modal-content">
            <input type="hidden" name="linkData" id="linkData">
            <div class="modal-header">
                <div class="d-flex align-items-center fs-7">
                    <i class="me-2 fs-5 text-primary" id="crudIcon"></i>
                    <span class="modal-title fw-semibold" id="crudTitle"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="crudForm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary" id="crudBtn"></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="delSize">
        <div class="modal-content">
            <input type="hidden" name="delId" id="delId">
            <input type="hidden" name="linkDel" id="linkDel">
            <div class="modal-header">
                <div class="d-flex align-items-center fs-7">
                    <i class="me-2 fs-5 text-primary" id="delIcon"></i>
                    <span class="modal-title fw-semibold" id="delTitle"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="fw-semibold fs-7 text-dark" id="delMsg"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No, Keep It</button>
                <button type="button" class="btn btn-sm btn-primary" id="delBtn"></button>
            </div>
        </div>
    </div>
</div>