<?php
    $current_user = $_SESSION['current_user'];

    if (isset($_GET['user_id']))
    {
        $user = get_user_by_id($_GET['user_id']);
    }
    else 
    {
        $user = get_user_by_id($current_user['user_id']);
    }

    //return link 
    $return_link = array();
    $return_link[] = array('key' => 'page', 'value' => null);
    $return_page_index = get_index($return_link, 'page');
?>

<section class="div-container">
    <div class="content col-12 col-lg-9 m-auto mb-3">
        <div class="d-flex align-items-center gap-2 mb-3">
            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
            <a href="<?= navigation_link($return_link) ?>" class="d-flex align-items-center return-button rounded-circle">
                <img src="../assets/images/return-arrow.png" alt="" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">User profile</h1>
        </div>
        <div class="profile-container rounded-4 d-flex flex-column gap-3" style="padding: 0;">
            <div class="profile-photo d-flex align-items-center justify-content-between bg-white rounded-4 p-3">
                <div class="d-flex align-items-center gap-4">
                    <img src="<?= $user['u_image'] ?>" alt="User profile" style="width: 85px; height: 85px;">
                    <div class="photo-text d-flex flex-column align-items-start gap-3">
                        <p class="m-0 fw-bold"><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></p>
                        <small class="badge rounded-pill text-bg-primary"><?= statut_name($user['u_statut']) ?></small>
                    </div>
                </div>
                <?php if ($current_user['user_id'] == $user['user_id']) { ?>
                    <div>
                        <div class="div-existence d-none d-md-block">
                            <button class="rounded-pill btn btn-primary gap-1 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#change-profil">
                                <img src="../assets/images/write.png" alt="Edit" style="width: 18px; height: 18px;">
                                <span class="fw-bold" style="">Edit profile</span>
                            </button>
                        </div>
                        <div class="div-ecistence d-md-none d-block">
                            <button class="rounded-circle btn btn-primary fw-bold d-flex align-items-center" style="padding: 8px;" data-bs-toggle="modal" data-bs-target="#change-profil">
                                <img src="../assets/images/write.png" alt="Edit" style="width: 18px; height: 18px;">
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- privacy condition -->
            <?php if ($current_user['user_id'] == $user['user_id']) { ?>
                <!-- user general information -->
                <div class="general-info bg-white rounded-4 p-3">
                    <div class="mb-4">
                        <h5 class="fw-bold">General Information</h5>
                    </div>
                    <form action="traitement_edit_profile.php" method="post">
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <div class="col">
                                <label for="last_name" class="form-label fw-bold  opacity-75">Last name</label>
                                <input type="text" class="form-control" style="padding: 8px 0.75rem;" id="last_name" name="last_name" value="<?= $user['u_last_name'] ?>" placeholder="Last name">
                                <small style="color: #5c6c74;"><?= $user['u_last_name'] ?></small>
                            </div>
                            <div class="col">
                                <label for="first_name" class="form-label fw-bold opacity-75">First name</label>
                                <input type="text" class="form-control" style="padding: 8px 0.75rem;" id="first_name" name="first_name" value="<?= $user['u_first_name'] ?>" placeholder="First name">
                                <small style="color: #5c6c74;"><?= $user['u_first_name'] ?></small>
                            </div>
                            <div class="col">
                                <label for="birth_date" class="form-label fw-bold opacity-75">Birthday</label>
                                <input type="date" class="form-control" style="padding: 8px 0.75rem;" id="birth_date" name="birth_date" value="<?= $user['u_birth_date'] ?>" placeholder="Birthday">
                                <small style="color: #5c6c74;"><?= $user['u_birth_date'] ?></small>
                            </div>
                            <div class="col">
                                <label for="gender" class="form-label fw-bold opacity-75">Gender</label>
                                <select name="gender" id="gender" class="form-select" style="padding: 8px 0.75rem;">
                                    <?php if ($user['u_gender'] == "M") { ?>
                                        <option class="fw-bold" value="" selected>Gender</option>
                                        <option value="M" selected>Male</option>
                                        <option value="F">Female</option>
                                    <?php } else if ($user['u_gender'] == "F") { ?>
                                        <option class="fw-bold" value="" selected>Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F" selected>Female</option>
                                    <?php } ?>
                                </select>
                                <small style="color: #5c6c74;"><?= gender_name($user['u_gender']) ?></small>
                            </div>
                        </div>
                        <input type="hidden" name="common_user" value="gen_info">
                        <!-- send or reset value -->
                        <div class="gap-1 d-flex justify-content-end mt-2" style="padding: 4px 8px;">
                            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
                            <button class="btn btn-light btn-sm rounded-pill fw-bold" type="reset">Reset</button>
                            <button class="btn btn-primary btn-sm rounded-pill fw-bold" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <!-- user security information -->
                <div class="security-info bg-white rounded-4 p-3">
                    <div class="mb-4">
                        <h5 class="fw-bold">Security</h5>
                    </div>
                    <form action="traitement_edit_profile.php" method="post">
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <div class="col">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" style="padding: 8px 0.75rem;" id="email" name="email" value="<?= $user['u_email'] ?>" placeholder="Email">
                                <small style="color: #5c6c74;"><?= $user['u_email'] ?></small>
                            </div>
                            <div class="col">
                                <label for="mdp" class="form-label fw-bold">Password</label>
                                <div class="input-container d-flex align-items-center">
                                    <input type="password" class="form-control" style="padding: 8px 0.75rem;" name="mdp" value="<?= $user['u_mdp'] ?>" id="password" placeholder="Password" style="padding: 6px 50px 6px 12px;">
                                    <label for="" class="toggle-icon">
                                        <img src="../assets/images/show.png" alt="show password" id="password_button" style="width: 22px; height: 22px;">
                                    </label>
                                </div>
                                <small style="color: #5c6c74;"><?= $user['u_mdp'] ?></small>
                            </div>
                        </div>
                        <input type="hidden" name="common_user" value="security">
                        <!-- send or reset value -->
                        <div class="gap-1 d-flex justify-content-end mt-2" style="padding: 4px 8px;">
                            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
                            <button class="btn btn-light btn-sm rounded-pill fw-bold" type="reset">Reset</button>
                             <button class="btn btn-primary btn-sm rounded-pill fw-bold" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <!-- user general information -->
                <div class="general-info bg-white rounded-4 p-3">
                    <div class="mb-4">
                        <h5 class="fw-bold">General Information</h5>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <div class="border border-dark-subtle rounded-3" style="padding: 5px 10px 5px 10px;">
                                <p class="mb-1 opacity-75 fw-bold">Last name</p>
                                <input type="text" class="text-black bg-white" value="<?= $user['u_last_name'] ?>" style="outline: none; border: none;" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border border-dark-subtle rounded-3" style="padding: 5px 10px 5px 10px;">
                                <p class="mb-1 opacity-75 fw-bold">First name</p>
                                <input type="text" class="text-black bg-white" value="<?= $user['u_first_name'] ?>" style="outline: none; border: none;" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border border-dark-subtle rounded-3" style="padding: 5px 10px 5px 10px;">
                                <p class="mb-1 opacity-75 fw-bold">Birthday</p>
                                <input type="text" class="text-black bg-white" value="<?= date_letter($user['u_birth_date']) ?>" style="outline: none; border: none;" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border border-dark-subtle rounded-3" style="padding: 5px 10px 5px 10px;">
                                <p class="mb-1 opacity-75 fw-bold">Gender</p>
                                <input type="text" class="text-black bg-white" value="<?= gender_name($user['u_gender']) ?>" style="outline: none; border: none;" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="change-profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reset_form('', 'edit_profile_form', 'input_file_text')"></button>
            </div>
            <div class="modal-body">
                <form action="traitement_image_profil.php" id="edit_profile_form" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label type="button" tabindex="0" role="button" onkeydown="click_button_label('', 'input_file_profile', event)" for="input_file_profile" class="d-flex align-items-center justify-content-between border rounded-2" style="border-style: dashed !important; padding: 6px 12px; cursor: pointer;">
                            <p class="m-0 fw-bold col" style="white-space: nowrap;text-overflow: ellipsis; overflow: hidden;">File: <span class="fw-normal" id="input_file_text">No file chosen</span></p>
                            <p class="m-0 fw-bold">User profile</p>
                        </label>
                        <div class="d-none">
                            <input type="file" name="image" id="input_file_profile" onchange="input_file_name('', 'input_file_profile', 'input_file_text')" accept="image/jpeg, image/png, image/jpg">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary rounded-1" data-bs-dismiss="modal" style="padding: 8px 20px 8px 20px;" onclick="reset_form('', 'edit_profile_form', 'input_file_text')">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-1" style="padding: 8px 20px 8px 20px;">Validate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/profile.js"></script>
<script src="../assets/js/user_management.js"></script>