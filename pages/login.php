<section class="inputs_container">
    <div class="inputs_div border border-dark-subtle rounded-3">
        <h1 class="fw-bold text-center mb-5">Log in</h1>
        <?php if (isset($_GET['error'])) { ?>
             <div class="alert alert-danger d-flex align-items-center" role="alert">
                 <img src="../assets/images/error.png" alt="" class="me-2" style="width: 20px; height: 20px;">
                 <div>
                     Email/password is incorrect
                 </div>
             </div>
        <?php } ?>
        <form action="traitement_login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Password</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
        </form>
        <!-- login link -->
        <?php 
            $link = array();
            $link[] = $link[] = array('key' => 'page', 'value' => "sign.php");
        ?>
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