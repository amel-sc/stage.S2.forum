<?php 
    //return link 
    $return_link = array();
    $return_link[] = array('key' => 'page', 'value' => null);
    $return_page_index = get_index($return_link, 'page');
    // user / admin list navigation link
    $user_controls_link = array();
    $user_controls_link[] = array('key' => 'page', 'value' => "user_management.php");
    $user_controls_link[] = array('key' => 'user_statut', 'value' => null);
    $user_statut_index = get_index($user_controls_link, "user_statut");
    // get user type 
    $user_list_condition = [];
    if (isset($_GET['user_statut']))
    {
        $user_list_condition[] = array('key' => 'u_statut', 'value' => $_GET['user_statut']);
        $user_statut = $_GET['user_statut'];
    }
    else 
    {
        $user_list_condition[] = array('key' => 'u_statut', 'value' => 0);
        $user_statut = 0;
    }

    $user_list_other_condition[] = "ORDER by u_last_name ASC";

    // all user list
    $user_list = select_table("user", $user_list_condition, null);

    // login user navigation link
    $login_link = array();
    $login_link[] = array('key' => 'page', 'value' => "traitement_login.php");
    $login_link[] = array('key' => 'user_id', 'value' => null);
    $login_link[] = array('key' => 'admin_login', 'value' => 1);
    $login_index = get_index($login_link, 'user_id');
    // edit profile navigation link
    $edit_profile_link = array();
    $edit_profile_link[] = array('key' => 'page', 'value' => "edit_profile.php");
    $edit_profile_link[] = array('key' => 'user_id', 'value' => null);
    $edit_profile_index = get_index($edit_profile_link, 'user_id');
    // create user navigation link
    $create_user_link = array();
    $create_user_link[] = array('key' => 'page', 'value' => null);
    $create_user_index = get_index($create_user_link, "page");
    // delete user navigation link
    $delete_user_link = array();
    $delete_user_link[] = array('key' => 'page', 'value' => 'traitement_delete_user.php');
    $delete_user_link[] = array('key' => 'user_id', 'value' => null);
    $delete_user_index = get_index($delete_user_link, "user_id");
    // reset user navigation link
    $reset_user_link = array();
    $reset_user_link[] = array('key' => 'page', 'value' => 'traitement_reset_user.php');
    $reset_user_link[] = array('key' => 'user_id', 'value' => null);
    $reset_user_index = get_index($reset_user_link, "user_id");

    // corbeille user navigation link
    $corbeille_link = array();
    $corbeille_link[] = array('key' => 'page', 'value' => 'traitement_corbeille.php');
    $corbeille_link[] = array('key' => 'user_id', 'value' => null);
    $corbeille_user_index = get_index($corbeille_link, "user_id");
    
?>

<section class="div-container">
    <div class="content col-12 col-lg-9 m-auto mb-3">
        <div class="d-flex align-items-center gap-2 mb-3">
            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
            <a href="<?= navigation_link($return_link) ?>" class="d-flex align-items-center return-button rounded-circle">
                <img src="../assets/images/return-arrow.png" alt="" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">User management</h1>
        </div>
        <div class="user-management-container rounded-4">
            <!-- user management navigation link -->
            <?php if ($user_statut == 0) { ?>
                <div class="nav_management rounded-2 mb-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; display: inline-block; padding: 0px 20px 0px 20px;">
                    <ul class="nav nav-underline">
                        <li class="nav-item text-center">
                            <?php $user_controls_link[$user_statut_index]['value'] = 0; ?>
                            <a class="nav-link active" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Users</a>
                        </li>
                        <li class="nav-item">
                            <?php $user_controls_link[$user_statut_index]['value'] = 1 ?>
                            <a class="nav-link" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Admins</a>
                        </li>
                        <li class="nav-item">
                            <?php $user_controls_link[$user_statut_index]['value'] = -1 ?>
                            <a class="nav-link" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Deleted</a>
                        </li>
                    </ul>
                </div>
            <?php } else if ($user_statut == 1) { ?>
                <div class="nav_management rounded-2 mb-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; display: inline-block; padding: 0px 20px 0px 20px;">
                    <ul class="nav nav-underline">
                        <li class="nav-item text-center">
                            <?php $user_controls_link[$user_statut_index]['value'] = 0; ?>
                            <a class="nav-link" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Users</a>
                        </li>
                        <li class="nav-item">
                            <?php $user_controls_link[$user_statut_index]['value'] = 1 ?>
                            <a class="nav-link active" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Admins</a>
                        </li>
                        <li class="nav-item">
                            <?php $user_controls_link[$user_statut_index]['value'] = -1 ?>
                            <a class="nav-link" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Deleted</a>
                        </li>
                    </ul>
                </div>
            <?php } else if ($user_statut == -1) { ?>
                <div class="nav_management rounded-2 mb-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; display: inline-block; padding: 0px 20px 0px 20px;">
                    <ul class="nav nav-underline">
                        <li class="nav-item text-center">
                            <?php $user_controls_link[$user_statut_index]['value'] = 0; ?>
                            <a class="nav-link" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Users</a>
                        </li>
                        <li class="nav-item">
                            <?php $user_controls_link[$user_statut_index]['value'] = 1 ?>
                            <a class="nav-link" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Admins</a>
                        </li>
                        <li class="nav-item">
                            <?php $user_controls_link[$user_statut_index]['value'] = -1 ?>
                            <a class="nav-link active" href="<?= navigation_link($user_controls_link) ?>" style="padding: 20px 15px 15px 15px;">Deleted</a>
                        </li>
                    </ul>
                </div>
            <?php } ?>
            <!-- user management header -->
            <div class="ms-4 d-flex align-items-center gap-4 management_header mb-3">
                <h1><?= statut_name_management($user_statut) ?></h1>
                <?php if($user_statut != -1) { ?>
                    <?php $create_user_link[$create_user_index]['value'] = 'create_user.php'; ?> 
                    <a href="<?= navigation_link($create_user_link) ?>" class="btn btn-primary rounded-1 fw-bold" style="padding: 10px 20px 10px 20px;">Add new</a>
                <?php } ?>
            </div>
            <!-- user list -->
            <div class="table-responsive" style="">
                <table class="table m-0 align-middle" style="white-space: nowrap;">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Photo</th>
                            <th scope="col">
                                User name
                            </th>
                            <th scope="col">Email</th>
                            <th scope="col">Inscription date</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Operation</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($user_list as $user) { ?> 
                            <tr style="border-style: hidden;">
                                <td class="text-center">
                                    <img src="<?= $user['u_image'] ?>" alt="User profile" style="width: 35px; height: 35px;">
                                </td>
                                <td><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></td>
                                <td><?= $user['u_email'] ?></td>
                                <td><?= $user['u_inscription_date'] ?></td>
                                <td><?= statut_name($user['u_statut']) ?></td>

                                <?php if ($user_statut == -1) { ?>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-evenly">
                                            <?php $reset_user_link[$reset_user_index]['value'] = $user['user_id']; ?>
                                            <a class="rounded-pill d-flex align-items-center header-link" href="<?= custom_navigation_link($reset_user_link) ?>">
                                                <img src="../assets/images/reset.png" alt="Reset profile" style="width: 35px; height: 35px; padding: 2px;">
                                            </a>
                                        </div>
                                    </td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-evenly">
                                            <?php $edit_profile_link[$edit_profile_index]['value'] = $user['user_id']; ?>
                                            <a class="rounded-pill d-flex align-items-center border-0 header-link" href="<?= navigation_link($edit_profile_link) ?>"> 
                                                <img src="../assets/images/edit.png" alt="Edit profile" style="width: 35px; height: 35px; padding: 5px;">
                                            </a>
                                            <?php $delete_user_link[$delete_user_index]['value'] = $user['user_id']; ?>
                                            <a class="rounded-pill d-flex align-items-center header-link" href="<?= custom_navigation_link($delete_user_link) ?>">
                                                <img src="../assets/images/trash.png" alt="Delete profile" style="width: 35px; height: 35px; padding: 5px;">
                                            </a>
                                        </div>
                                    </td>
                                <?php } ?>

                                <td class="text-center">
                                    <?php if ($user_statut == -1) { ?>
                                        <?php $corbeille_link[$corbeille_user_index]['value'] = $user['user_id'] ?>
                                        <a href="<?= custom_navigation_link($corbeille_link) ?>" class="btn btn-danger fw-bold rounded-1 text-white" style="text-decoration: none; padding: 2px 12px 2px 12px;">Delete</a>
                                    <?php } else { ?>
                                        <?php $login_link[$login_index]['value'] = $user['user_id']; ?>
                                        <a href="<?= custom_navigation_link($login_link) ?>" class="btn btn-primary fw-bold rounded-1 text-white" style="text-decoration: none; padding: 2px 12px 2px 12px;">Login</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>