<?php 
    // login link
    $link = array();
    $link[] = $link[] = array('key' => 'page', 'value' => "login.php");
?>

<section class="inputs_container">
    <div class="inputs_div rounded-4">
        <h1 class="fw-bold text-center mb-4" style="color: #0d6efd;">Sign in</h1>
        <!-- user already exist -->
        <?php if (isset($_GET['user_exist'])) { ?>
             <div class="alert alert-danger d-flex align-items-center" role="alert">
                 <img src="../assets/images/error.png" alt="" class="me-2" style="width: 20px; height: 20px;">
                 <div>
                     Email already exist.
                 </div>
             </div>
        <?php } ?>
        <!-- user deleted -->
        <?php if (isset($_GET['deleted'])) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                 <img src="../assets/images/error.png" alt="" class="me-2" style="width: 20px; height: 20px;">
                 <div>
                     User is deleted
                 </div>
             </div>
        <?php } ?>
        <!-- sign in succes -->
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
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="input_button btn btn-primary fw-bold rounded-3">Sign in</button>
            </div>
        </form>
        <div class="text-center">
            <p class="m-0">
                Already an account?
                <a href="<?= navigation_link($link) ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                    Log in
                </a>
            </p>
        </div>
    </div>
</section>