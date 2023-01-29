<div class="modal fade ajaxModal" id="ajaxModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate id="formsKu">
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body mb-4">
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="role">Role</label>
                            <select class="custom-select custom-select-lg" name="status" id="status" require>
                                <option disable selected>Verifikasi Data Tamu</option>
                                <option value="invalid">Invalid</option>
                                <option value="valid">Valid</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Role
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveUpdateBtn" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>