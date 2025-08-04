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
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2 align-items-lg-center">
                    <li class="nav-item">
                        <?php $link[$page_index]['value'] = "home.php"; ?>
                        <div class="d-block d-lg-none">
                            <a class="d-flex align-items-center header-link gap-2" href="<?= navigation_link($link) ?>"> 
                                <img class="" src="../assets/images/home.png" alt="" style="width: 35px; height: 35px; padding: 5px;">
                                <span class="text-black d-block d-lg-none">Home</span>
                            </a>
                        </div>
                        <div class="d-none d-lg-block">
                            <a class="rounded-circle d-flex align-items-center header-link gap-2" href="<?= navigation_link($link) ?>"> 
                                <img class="" src="../assets/images/home.png" alt="" style="width: 35px; height: 35px; padding: 5px;">
                                <span class="text-black d-block d-lg-none">Home</span>
                            </a>
                        </div>
                    </li>
                    <?php if ($_SESSION['current_user']['u_statut'] != 0 ) { ?>
                        <li class="nav-item">
                            <?php $link[$page_index]['value'] = "create_post.php"; ?>
                            <div class="d-block d-lg-none">
                                <a class="d-flex align-items-center header-link gap-2" href="<?= navigation_link($link) ?>"> 
                                    <img class="" src="../assets/images/plus.png" alt="" style="width: 35px; height: 35px; padding: 5px;">
                                    <span class="text-black d-block d-lg-none">Create</span>
                                </a>
                            </div>
                            <div class="d-none d-lg-block">
                                <a class="rounded-pill d-flex align-items-center header-link gap-2" href="<?= navigation_link($link) ?>"> 
                                    <img class="" src="../assets/images/plus.png" alt="" style="width: 35px; height: 35px; padding: 5px;">
                                    <span class="text-black d-block d-lg-none">Create</span>
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <div class="d-block d-lg-none">
                            <button type="button" class="d-flex align-items-center header-link gap-2 custom-btn" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none; width: 100%;">
                                <img class="" src="<?= $user_header['u_image'] ?>" alt="" style="width: 35px; height: 35px">
                                <span class="text-black d-block d-lg-none">Profile</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end" style="min-width: 250px;">
                                <li>
                                    <?php $link[$page_index]['value'] = "profile.php"; ?>
                                    <a class="d-flex align-items-center header-link gap-2" href="<?= navigation_link($link) ?>" style="padding: 10px 0px 10px 16px;">
                                        <img class="" src="<?= $user_header['u_image'] ?>" alt="" style="width: 35px; height: 35px">
                                        <span class="text-black d-block">View Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <?php $link[$page_index]['value'] = "profile.php"; ?>
                                    <a class="d-flex align-items-center header-link gap-2" href="#" style="padding: 10px 0px 10px 16px;">
                                        <img class="" src="../assets/images/log-out.png" alt="" style="width: 35px; height: 35px; padding: 5px;">
                                        <span class="text-black d-block">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-none d-lg-block">
                            <button type="button" class="rounded-circle d-flex align-items-center header-link gap-2 custom-btn" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none; width: 100%;">
                                <img src="<?= $user_header['u_image'] ?>" alt="" style="width: 35px; height: 35px">
                                <span class="text-black d-block d-lg-none">Profile</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end" style="min-width: 250px;">
                                <li>
                                    <?php $link[$page_index]['value'] = "profile.php"; ?>
                                    <a class="d-flex align-items-center header-link gap-2" href="<?= navigation_link($link) ?>" style="padding: 10px 0px 10px 16px;">
                                        <img class="" src="<?= $user_header['u_image'] ?>" alt="" style="width: 35px; height: 35px">
                                        <span class="text-black d-block">View Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <?php $link[$page_index]['value'] = "login.php"; ?>
                                    <a class="d-flex align-items-center header-link gap-2" href="<?= navigation_link($link) ?>" style="padding: 10px 0px 10px 16px;">
                                        <img class="" src="../assets/images/log-out.png" alt="" style="width: 35px; height: 35px; padding: 5px;">
                                        <span class="text-black d-block">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>