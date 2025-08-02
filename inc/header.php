<?php
    // naviagtion link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    $user_header = get_user_by_id($_SESSION['current_user']['user_id']);
?>

<header>
    <nav class="navbar navbar-expand-lg fixed-top border-bottom border-dark-subtle" style="background-color: white;" data-bs-theme="light">
        <div class="container-fluid">
            <?php $link[$page_index]['value'] = "home.php"; ?>
            <a class="navbar-brand fw-bold fs-3" href="<?= navigation_link($link) ?>">Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php $link[$page_index]['value'] = "home.php"; ?>
                        <a class="nav-link" href="<?= navigation_link($link) ?>">Posts</a>
                    </li>
                    <li class="nav-item">
                        <?php $link[$page_index]['value'] = "profile.php"; ?>
                        <a class="rounded-circle header-link" href="<?= navigation_link($link) ?>">
                            <img src="<?= $user_header['u_image'] ?>" alt="" style="width: 35px; height: 35px">
                            <p class="d-block d-lg-none">Texte visible uniquement ≤ 992px</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Connexion
                        </a>
                        <ul class="dropdown-menu">
                            <?php $link[$page_index]['value'] = "login.php"; ?>
                            <li><a class="dropdown-item" href="<?= navigation_link($link) ?>">Log in</a></li>
                            <?php $link[$page_index]['value'] = "sign.php"; ?>
                            <li><a class="dropdown-item" href="<?= navigation_link($link) ?>">Sign in</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>