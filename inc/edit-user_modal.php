<?php
    $edit_modal_id = $user['user_id'] . "edit_profile";
    $edit_user = $user;
?>
<!-- Button trigger modal -->
<button class="rounded-pill d-flex align-items-center border-0 bg-transparent"  data-bs-toggle="modal" data-bs-target="<?= "#" . $edit_modal_id ?>"> 
        <img src="../assets/images/edit.png" alt="Edit profile" style="width: 35px; height: 35px; padding: 5px;">
</button>

<!-- Modal -->
<div class="modal fade" id="<?= $edit_modal_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reset_form('<?= $edit_user['user_id'] ?>', '_edit_form', '_image_name')"></button>
            </div>
            <div class="modal-body">
                <form action="traitement_edit_profile.php" id="<?= $edit_user['user_id'] ?>_edit_form" method="post" enctype="multipart/form-data">
                    <div class="d-flex flex-column align-items-center justify-content-center gap-2 mb-3">
                        <img src="<?= $edit_user['u_image'] ?>" alt="User profile" style="width: 100px; height: 100px;">
                        <label type="button" tabindex="0" role="button" for="<?= $edit_user['user_id'] ?>_image" class="btn btn-primary fw-bold rounded-1" onkeydown="click_button_label('<?= $edit_user['user_id'] ?>', '_image', event)">
                            Change profil
                        </label>
                        <div class="d-none">
                            <input type="file" id="<?= $edit_user['user_id'] ?>_image" name="image" onchange="input_file_name('<?= $edit_user['user_id'] ?>', '_image', '_image_name')">
                        </div>
                        <small class="fw-bold">Profil: <span id="<?= $edit_user['user_id'] ?>_image_name" class="fw-normal">No file chosen</span></small>
                    </div>
                    <div class="name_div mb-3 d-flex align-items-center justify-content-between gap-3">
                        <div class="last_name">
                            <label for="<?= $edit_user['user_id'] ?>_last_name" class="form-label fw-bold">Last name</label>
                            <input type="text" class="form-control" id="<?= $edit_user['user_id'] ?>_last_name" name="last_name" placeholder="Last name">
                            <small style="color: #5c6c74;"><?= $edit_user['u_last_name'] ?></small>
                        </div>
                        <div class="first_name">
                            <label for="<?= $edit_user['user_id'] ?>_first_name" class="form-label fw-bold">First name</label>
                            <input type="text" class="form-control" id="<?= $edit_user['user_id'] ?>_first_name" name="first_name" placeholder="First name">
                            <small style="color: #5c6c74;"><?= $edit_user['u_first_name'] ?></small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="<?= $edit_user['user_id'] ?>_birth_date" class="form-label fw-bold">Birthday</label>
                        <input type="date" class="form-control" id="<?= $edit_user['user_id'] ?>_birth_date" name="birth_date" placeholder="Birthday">
                        <small style="color: #5c6c74;"><?= $edit_user['u_birth_date'] ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="<?= $edit_user['user_id'] ?>_gender" class="form-label fw-bold">Gender</label>
                        <select id="<?= $edit_user['user_id'] ?>_gender" name="gender" class="form-select">
                            <option value="" selected>--Gender--</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <small style="color: #5c6c74;"><?= gender_name($edit_user['u_gender']) ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="<?= $edit_user['user_id'] ?>_statut" class="form-label fw-bold">Statut</label>
                        <select id="<?= $edit_user['user_id'] ?>_statut" name="statut" class="form-select">
                            <option value="" selected>--Statut--</option>
                            <option value="0">Common user</option>
                            <option value="1">Admin</option>
                        </select>
                        <small style="color: #5c6c74;"><?= statut_name($edit_user['u_statut']) ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="<?= $edit_user['user_id'] ?>_email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="<?= $edit_user['user_id'] ?>_email" name="email" placeholder="Email">
                        <small style="color: #5c6c74;"><?= $edit_user['u_email'] ?></small>
                    </div>
                    <div class="">
                        <label for="<?= $edit_user['user_id'] ?>_mdp" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="<?= $edit_user['user_id'] ?>_mdp" name="mdp" placeholder="Change password or not">
                        <small style="color: #5c6c74;"><?= $edit_user['u_mdp'] ?></small>
                    </div>
                    <input type="hidden" name="user_id" value="<?= $edit_user['user_id'] ?>">
                    <div class="d-none">
                        <button type="submit" id="<?= $edit_user['user_id'] ?>_validate-button" class="btn btn-primary fw-bold rounded-1" style="padding: 8px 20px 8px 20px;">Validate</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fw-bold rounded-1" data-bs-dismiss="modal" style="padding: 8px 20px 8px 20px;" onclick="reset_form('<?= $edit_user['user_id'] ?>', '_edit_form', '_image_name')">Cancel</button>
                <label type="button" tabindex="0" role="button" for="<?= $edit_user['user_id'] ?>_validate-button" class="btn btn-primary fw-bold rounded-1" style="padding: 8px 20px 8px 20px;" onkeydown="click_button_label('<?= $edit_user['user_id'] ?>', '_validate-button', event)">
                    Validate
                </label>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/edit-user_modal.js"></script>