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
?>

<section class="div-container">
    <h1 class="fw-medium">User profile</h1>
    <div class="user-profile d-flex flex-column flex-lg-row align-items-lg-start gap-4">
        <!-- image and name -->
        <div class="border border-dark-subtle rounded-3 col-12 col-lg-2 d-flex flex-column align-items-center justify-content-center img_name-div">
            <img src="<?= $user['u_image'] ?>" alt="" class="mb-3" style="width: 80px; height: 80px;">
            <p class="m-0 fw-bold"><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></p>
            <?php if ($user['user_id'] == $current_user['user_id']) { ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#change-profil">
                    Change profil
                </button>
            <?php } ?>
        </div>
        <!-- other information -->
        <div class="d-flex flex-column border border-dark-subtle rounded-3 mb-4 col">
            <!-- general information -->
            <div class="general-info rounded-3 col">
                <h4 class="mb-3">General information</h4>
                <div class="row row-cols-1 row-cols-lg-2 g-4">
                    <div class="col">
                        <div class="info-div border border-dark-subtle rounded-3">
                            <small>First name</small>
                            <p class="m-0 fs-5"><?= $user['u_first_name'] ?></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="info-div border border-dark-subtle rounded-3">
                            <small>Last name</small>
                            <p class="m-0 fs-5"><?= $user['u_last_name'] ?></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="info-div border border-dark-subtle rounded-3">
                            <small>Birthday</small>
                            <p class="m-0 fs-5"><?= $user['u_birth_date'] ?></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="info-div border border-dark-subtle rounded-3">
                            <small>Gender</small>
                            <!-- gender's condition -->
                            <?php 
                                $gender = $user['u_gender'];
                                if ($gender == "M")
                                {
                                    $gender = "Male";
                                } 
                                else if ($gender == "F")
                                {
                                    $gender = "Female";
                                }
                            ?>
    
                            <p class="m-0 fs-5"><?= $gender ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($user['user_id'] == $current_user['user_id']) { ?>
                <hr class="m-0">
                <!-- security -->
                <div class="security-info rounded-3 col mb-lg-0">
                    <h4 class="mb-3">Security</h4>
                    <div class="row row-cols-1 row-cols-lg-2 g-4">
                        <div class="col">
                            <div class="info-div border border-dark-subtle rounded-3">
                                <small>Email</small>
                                <p class="m-0 fs-5"><?= $user['u_email'] ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="info-div border border-dark-subtle rounded-3">
                                <small>password</small>
                                <?php
                                    $password = $user['u_mdp'];
                                    $dot_mdp = "";
                                    for ($i = 0; $i < strlen($password); $i++)
                                    {
                                        $dot_mdp = $dot_mdp . "&#x2022;";
                                    }
                                ?>
                                <p class="m-0 fs-5"><?= $dot_mdp ?></p>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="traitement_image_profil.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" id="" name="image" accept="image/jpeg, image/png, image/jpg" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Validate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>