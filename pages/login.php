<section class="inputs_container">
    <div class="inputs_div border border-0 rounded-3">
        <h1 class="fw-bold text-center mb-5">Log in</h1>
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
                <button type="submit">Log in</button>
            </div>
        </form>
        <!-- login link -->
        <?php 
            $link = array();
            $link[] = $link[] = array('key' => 'page', 'value' => "sign.php");
        ?>
        <div class="d-flex justify-content-end">
            <a href="<?= navigation_link($link) ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                Sign in
            </a>
        </div>
    </div>
</section>