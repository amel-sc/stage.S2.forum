<?php
    $user = $_SESSION['current_user'];
?>

<section class="profile-container" style="margin-top: 65px;">
    <h1 class="fw-medium">User profile</h1>
    <div class="user-profile d-flex flex-column d-md-flex flex-md-row gap-2 align-items-start justify-content-md-between">
        <!-- image and name -->
        <div class="border border-dark-subtle rounded-3 col-12 col-md-2 d-flex flex-column align-items-center justify-content-center gap-3 img_name-div">
            <img src="<?= $user['u_image'] ?>" alt="" style="width: 80px; height: 80px;">
            <p class="m-0"><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></p>
        </div>
        <!-- general information -->
        <div class="general-info border border-dark-subtle rounded-3 col-12 col-md-9">
            <h4 class="mb-3">General information</h4>
            <div class="d-md-flex align-items-center justify-content-between">
                <div class="info-div border border-dark-subtle rounded-3 col-12 col-md-5">
                    <small>First name</small>
                    <p class="m-0 fs-5"><?= $user['u_first_name'] ?></p>
                </div>
                <div class="info-div border border-dark-subtle rounded-3 col-12 col-md-5">
                    <small>Last name</small>
                    <p class="m-0 fs-5"><?= $user['u_last_name'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>