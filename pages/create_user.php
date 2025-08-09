<?php
    //navigation link to user_management.php
    $return_link = array();
    $return_link[] = array('key' => 'page', 'value' => null);
    $return_page_index = get_index($return_link, 'page'); 
?>
<section class="div-container">
    <div class="content m-auto mb-3" style="max-width: 600px;">
        <div class="d-flex align-items-center gap-2 mb-3">
            <?php $return_link[$return_page_index]['value'] = 'user_management.php' ?>
            <a href="<?= navigation_link($return_link) ?>" class="d-flex align-items-center return-button rounded-circle">
                <img src="../assets/images/return-arrow.png" alt="" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">Create user</h1>
        </div>
        <div class="edit-profile-container rounded-4">
            <!-- user deleted -->
            <?php if (isset($_GET['deleted'])) { ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <img src="../assets/images/error.png" alt="" class="me-2" style="width: 20px; height: 20px;">
                    <div>
                        User is deleted
                    </div>
                </div>
            <?php } ?>
            <!-- user already exist -->
            <?php if (isset($_GET['user_exist'])) { ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                 <img src="../assets/images/error.png" alt="" class="me-2" style="width: 20px; height: 20px;">
                 <div>
                     Email already exist.
                 </div>
             </div>
            <?php } ?>
            <!-- creation successful -->
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                 <img src="../assets/images/success.png" alt="" class="me-2" style="width: 20px; height: 20px;">
                 <div>
                     Success! Your account has been created
                 </div>
             </div>
            <?php } ?>
            <form action="traitement_sign.php" method="post">
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
                <div class="mb-3">
                    <label for="mdp" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password" required>
                </div>
                <input type="hidden" name="admin_create" value="1">
                <div class="d-flex align-items-center justify-content-center gap-4">
                    <?php $return_link[$return_page_index]['value'] = 'user_management.php'; ?>
                    <a href="<?= navigation_link($return_link) ?>" class="btn btn-secondary rounded-1 text-white" style="text-decoration: none; padding: 8px 20px 8px 20px;">Cancel</a>
                    <button type="submit" class="btn btn-primary fw-bold rounded-1" style="padding: 8px 20px 8px 20px;">Validate</button>
                </div>
            </form>
        </div>
    </div>
</section>