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
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Masukan Username.
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row" id="formPassword">
                        <div class="col-md-12 mb-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            <div class="invalid-feedback">
                                Masukan Password
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="role">Role</label>
                            <select class="custom-select custom-select-lg" name="role" id="role" require>
                                <option disable selected>Select Role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Role
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveBtn" class="btn btn-primary">Save</button>
                    <button type="submit" id="updateBtn" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>