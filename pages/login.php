<?php 
    // login link
    $link = array();
    $link[] = $link[] = array('key' => 'page', 'value' => "sign.php");
?>
<section class="inputs_container">
    <div class="inputs_div rounded-4">
        <h1 class="fw-bold text-center mb-4" style="color: #0d6efd;">Log in</h1>
        <!-- error email or mdp -->
        <?php if (isset($_GET['error'])) { ?>
             <div class="alert alert-danger d-flex align-items-center rounded-1 gap-3" role="alert">
                <img src="../assets/images/error.png" alt="" class="" style="width: 20px; height: 20px;">
                <div>
                    Email/password is incorrect.
                </div>
             </div>
        <?php } ?>
        <!-- user deleted -->
        <?php if (isset($_GET['deleted'])) { ?>
            <div class="alert alert-danger d-flex align-items-center rounded-1 gap-3" role="alert">
                 <img src="../assets/images/error.png" alt="" class="" style="width: 20px; height: 20px;">
                 <div>
                    User does not exist.
                 </div>
             </div>
        <?php } ?>
        <form action="traitement_login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label fw-bold">Password</label>
                <div class="input-container d-flex align-items-center">
                    <input type="password" class="form-control" name="mdp" id="password" placeholder="Password" required style="padding: 6px 50px 6px 12px;">
                    <label for="" class="toggle-icon">
                        <img src="../assets/images/show.png" alt="show password" id="password_button" style="width: 22px; height: 22px;">
                    </label>
                </div>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="input_button btn btn-primary">Log in</button>
            </div>
        </form>
        <div class="text-center">
            <p class="m-0">
                Don't have an account?
                <a href="<?= navigation_link($link) ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</section>

<script src="../assets/js/profile.js"></script>