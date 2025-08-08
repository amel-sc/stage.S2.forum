<?php 
    if (isset($_GET['user_id']))
    {
        // user_condition
        $user_condition = array();
        $user_condition[] = array('key' => "user_id", "value" => $_GET['user_id']);
        // result
        $user = select_table('user', $user_condition, null)[0];
    }
?>
<section class="div-container">
    <div class="content m-auto mb-3" style="max-width: 600px;">
        <div class="edit-profile-container rounded-4">
            <div class="d-flex flex-column align-items-center justify-content-center gap-2 mb-3">
                <img src="<?= $user['u_image'] ?>" alt="User profile" style="width: 100px; height: 100px;">
                <button type="button" class="btn btn-primary fw-bold rounded-1" data-bs-toggle="modal" data-bs-target="#change-profil">
                    Change profil
                </button>
            </div>
            <form action="traitement_edit_profile.php" method="post">
                <div class="name_div mb-3 d-flex align-items-center justify-content-between gap-3">
                    <div class="last_name">
                        <label for="last_name" class="form-label fw-bold">Last name</label>
                        <input type="text" value="<?= $user['u_last_name'] ?>" class="form-control" id="last_name" name="last_name" placeholder="Last name" required>
                        <small style="color: #5c6c74;"><?= $user['u_last_name'] ?></small>
                    </div>
                    <div class="first_name">
                        <label for="first_name" class="form-label fw-bold">First name</label>
                        <input type="text" value="<?= $user['u_first_name'] ?>" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                        <small style="color: #5c6c74;"><?= $user['u_first_name'] ?></small>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label fw-bold">Birthday</label>
                    <input type="date" value="<?= $user['u_birth_date'] ?>" class="form-control" id="birth_date" name="birth_date" placeholder="Birthday" required>
                    <small style="color: #5c6c74;"><?= $user['u_birth_date'] ?></small>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label fw-bold">Gender</label>
                    <select name="gender" id="gender" class="form-select">
                        <?php if ($user['u_gender'] == "M") { ?>
                            <option value="M" selected>Male</option>
                            <option value="F">Female</option>
                        <?php } else if ($user['u_gender']) { ?>
                            <option value="M">Male</option>
                            <option value="F" selected>Female</option>
                        <?php } ?>
                    </select>
                    <small style="color: #5c6c74;"><?= gender_name($user['u_gender']) ?></small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" value="<?= $user['u_email'] ?>" class="form-control" id="email" name="email" placeholder="Email" required>
                    <small style="color: #5c6c74;"><?= $user['u_email'] ?></small>
                </div>
                <div class="mb-3">
                    <label for="mdp" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Change password" required>
                    <small style="color: #5c6c74;"><?= $user['u_mdp'] ?></small>
                </div>
                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                <div class="d-flex align-items-center justify-content-center gap-4">
                    <button type="" class="btn btn-secondary fw-bold rounded-1" style="padding: 8px 20px 8px 20px;">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold rounded-1" style="padding: 8px 20px 8px 20px;">Validate</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="change-profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="traitement_image_profil.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" id="" name="image" accept="image/jpeg, image/png, image/jpg" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                    </div>
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary rounded-1" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-1">Validate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>