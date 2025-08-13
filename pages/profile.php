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

    // password hidden
    $mdp_statut = null;
    if (isset($_GET['mdp_statut']))
    {
        $mdp_statut = $_GET['mdp_statut'];   
    }
    else 
    {
        $mdp_statut = "hide";
    }

    // password navigation link
    $link_password = array();
    $link_password[] = array('key' => 'page', 'value' => 'profile.php');
    $link_password[] = array('key' => 'user_id', 'value' => $user['user_id']);
    $link_password[] = array('key' => 'mdp_statut', 'value' => null);
    $password_index = get_index($link_password, "mdp_statut");
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
                    <div class="photo-text d-flex flex-column gap-3">
                        <p class="m-0 fw-bold"><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></p>
                        <small class="m-0 badge rounded-pill text-bg-primary w-50"><?= statut_name($user['u_statut']) ?></small>
                    </div>
                </div>
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
            </div>

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
                            <input type="text" class="text-black bg-white" value="<?= $user['u_birth_date'] ?>" style="outline: none; border: none;" disabled>
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
            <?php if ($user['user_id'] == $current_user['user_id']) { ?>
                <div class="security-info bg-white rounded-4 p-3">
                    <div class="mb-4">
                        <h5 class="fw-bold">Security</h5>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <div class="border border-dark-subtle rounded-3" style="padding: 5px 10px 5px 10px;">
                                <p class="mb-1 opacity-75 fw-bold">Email</p>
                                <input type="text" class="text-black bg-white" value="<?= $user['u_email'] ?>" style="outline: none; border: none;" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border border-dark-subtle rounded-3" style="padding: 5px 10px 5px 10px;">
                                <p class="mb-1 opacity-75 fw-bold">Password</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <input type="password" id="password" class="text-black bg-white" value="<?= $user['u_mdp'] ?>" style="outline: none; border: none;" disabled>
                                    <img src="../assets/images/show.png" alt="hide/show password" id="password_button" style="width: 25px; height: 25px; cursor: pointer;">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="change-profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="traitement_image_profil.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="input_file_profile" class="d-flex align-items-center justify-content-between border rounded-2" style="border-style: dashed !important; padding: 6px 12px; cursor: pointer;">
                            <p class="m-0 fw-bold col" style="white-space: nowrap;text-overflow: ellipsis; overflow: hidden;">File: <span class="fw-normal" id="input_file_text">No file chosen</span></p>
                            <p class="m-0 fw-bold">User profile</p>
                        </label>
                        <div class="d-none">
                            <input type="file" name="image" id="input_file_profile" onchange="input_file_name('', 'input_file_profile', 'input_file_text')" accept="image/jpeg, image/png, image/jpg">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary rounded-1" data-bs-dismiss="modal" style="padding: 8px 20px 8px 20px;">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-1" style="padding: 8px 20px 8px 20px;">Validate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/profile.js"></script>
<script src="../assets/js/user_management.js"></script>