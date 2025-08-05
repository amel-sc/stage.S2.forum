<section class="inputs_container">
    <div class="inputs_div border border-dark-subtle rounded-3">
        <h1 class="fw-bold text-center mb-5">Sign in</h1>
        <form action="traitement_sign.php" method="post">
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Birthday</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Birthday" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Password</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
        <!-- login link -->
        <?php 
            $link = array();
            $link[] = $link[] = array('key' => 'page', 'value' => "login.php");
        ?>
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