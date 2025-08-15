<?php
    $create_user_modal_id = "create_user";
?>
<!-- Button trigger modal -->
<button class="btn btn-primary rounded-1 fw-bold" style="padding: 10px 20px 10px 20px;" data-bs-toggle="modal" data-bs-target="<?= "#" . $create_user_modal_id ?>"> 
    Add new
</button>

<!-- Modal -->
<div class="modal fade" id="<?= $create_user_modal_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reset_form('', 'create_user_form', 'input_file_text')"></button>
            </div>
            <div class="modal-body">
                <form action="traitement_sign.php" method="post" id="create_user_form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label type="button" tabindex="0" role="button" onkeydown="click_button_label('', 'input_file_profile', event)" for="input_file_profile" class="d-flex align-items-center justify-content-between border rounded-2" style="border-style: dashed !important; padding: 6px 12px; cursor: pointer;">
                            <p class="m-0 fw-bold col" style="white-space: nowrap;text-overflow: ellipsis; overflow: hidden;">File: <span class="fw-normal" id="input_file_text">No file chosen</span></p>
                            <p class="m-0 fw-bold">User profile</p>
                        </label>
                        <div class="d-none">
                            <input type="file" name="image" id="input_file_profile" onchange="input_file_name('', 'input_file_profile', 'input_file_text')" accept="image/jpeg, image/png, image/jpg">
                        </div>
                    </div>
                    <div class="name_div mb-3 d-flex align-items-center justify-content-between gap-3">
                        <div class="last_name">
                            <label for="last_name" class="form-label fw-bold">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" required>
                        </div>
                        <div class="first_name">
                            <label for="first_name" class="form-label fw-bold">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label fw-bold">Birthday</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Birthday" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label fw-bold">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="statut" class="form-label fw-bold">Statut</label>
                        <select name="statut" id="statut" class="form-select">
                            <option value="0">Common user</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="">
                        <label for="mdp" class="form-label fw-bold">Password</label>
                        <div class="input-container d-flex align-items-center">
                            <input type="password" class="form-control" name="mdp" id="password" placeholder="Password" required style="padding: 6px 50px 6px 12px;">
                            <label for="" class="toggle-icon">
                                <img src="../assets/images/show.png" alt="show password" id="password_button" style="width: 22px; height: 22px;">
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="admin_create" value="1">
                    <div class="d-none">
                        <button type="submit" id="create_user_validate" class="btn btn-primary fw-bold rounded-1" style="padding: 8px 20px 8px 20px;">Validate</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fw-bold rounded-1" data-bs-dismiss="modal" style="padding: 8px 20px 8px 20px;" onclick="reset_form('', 'create_user_form', 'input_file_text')">Cancel</button>
                <label type="button" tabindex="0" role="button" for="create_user_validate" class="btn btn-primary fw-bold rounded-1" style="padding: 8px 20px 8px 20px;" onkeydown="click_button_label('', 'create_user_validate', event)">
                    Validate
                </label>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/profile.js"></script>
<script src="../assets/js/user_management.js"></script>