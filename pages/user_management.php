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
        $user_statut = $_GET['user_statut'];
        if ($user_statut == "all")
        {
            $suer_list_condition = null;
        }
        else 
        {
            $user_list_condition[] = array('key' => 'u_statut', 'value' => $user_statut);
        }
    }
    else 
    {
        $user_statut = "all";
        $user_list_condition = null;
    }
    // all user list sql
    $user_list_sql = select_table_sql("user", $user_list_condition, null);

    // create page
    $sql = $user_list_sql;
    $pagination = create_pagination($sql);
    $total_page = count($pagination);
    
    if (isset($_GET['index_pagination']))
    {
        // get one page result
        $index_pagination = $_GET['index_pagination'];
        $user_list = one_page_result($user_list_sql, $pagination, $index_pagination);
    }
    else 
    {
        // get first page result
        $index_pagination = 1;
        $user_list = one_page_result($user_list_sql, $pagination, $index_pagination);
    }


    // login user navigation link
    $login_link = array();
    $login_link[] = array('key' => 'page', 'value' => "traitement_login.php");
    $login_link[] = array('key' => 'user_id', 'value' => null);
    $login_link[] = array('key' => 'admin_login', 'value' => 1);
    $login_index = get_index($login_link, 'user_id');
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
                <img src="../assets/images/return-arrow.png" alt="User profile" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">User management</h1>
        </div>
        <!-- user already exist -->
        <?php if (isset($_GET['user_exist'])) { ?>
            <div class="alert alert-danger d-flex align-items-start align-items-md-center gap-2 flex-column flex-md-row rounded-1 p-2 p-md-3" role="alert" style="">
                <div class="d-flex align-items-center gap-2 w-100">
                    <img src="../assets/images/error.png" alt="Error" style="width: 24px; height: 24px; flex-shrink: 0;">
                    <div class="">
                        Email already in use. Try 
                        <span class="alert-link text-decoration-underline fw-semibold" style="">Logging in</span> 
                        or use a different email.
                    </div>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style=""></button>
            </div>
        <?php } ?>
        <!-- user deleted -->
        <?php if (isset($_GET['deleted'])) { ?>
            <div class="alert alert-danger d-flex align-items-start align-items-md-center gap-2 flex-column flex-md-row rounded-1 p-2 p-md-3" role="alert" style="">
                <div class="d-flex align-items-center gap-2 w-100">
                    <img src="../assets/images/error.png" alt="Error" style="width: 24px; height: 24px; flex-shrink: 0;">
                    <div class="">
                        User does not exist.
                    </div>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style=""></button>
            </div>
        <?php } ?>
        <!-- sign in succes -->
         <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success d-flex align-items-start align-items-md-center gap-2 flex-column flex-md-row rounded-1 p-2 p-md-3" role="alert" style="">
                <div class="d-flex align-items-center gap-2 w-100">
                    <img src="../assets/images/success.png" alt="Error" style="width: 24px; height: 24px; flex-shrink: 0;">
                    <div class="">
                        Success! Your account has been created.
                    </div>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style=""></button>
            </div>
        <?php } ?>
        <!-- delete the current user -->
         <?php if (isset($_GET['delete_current_user'])) { ?>
            <div class="alert alert-danger d-flex align-items-start align-items-md-center gap-2 flex-column flex-md-row rounded-1 p-2 p-md-3" role="alert" style="">
                <div class="d-flex align-items-center gap-2 w-100">
                    <img src="../assets/images/error.png" alt="Error" style="width: 24px; height: 24px; flex-shrink: 0;">
                    <div class="">
                        Error! Cannot delete the current user.
                    </div>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style=""></button>
            </div>
        <?php } ?>
        
        <div class="user-management-container rounded-4">
            <!-- header -->
            <div class="management-title d-flex align-items-center justify-content-between mb-3">
                <h3 class="m-0 fw-bold">
                    Users
                    <?php if ($total_page > 1) { ?>
                        <span> <?= $index_pagination ?> / <?= $total_page ?></span> 
                    <?php } ?>
                </h3>
                <div class="add-new">
                    <?php include("../inc/create-user_modal.php"); ?>
                </div>
            </div>
            <!-- users type choice -->
            <div class="d-flex align-items-center gap-1 mb-3">
                <p class="m-0">Statut: </p>
                <div class="d-block dropdown">
                    <button class="header-link rounded-pill px-3 py-2 custom-btn d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none;">
                        <span><?= statut_name($user_statut) ?></span>
                        <img src="../assets/images/down.png" alt="Dropdown toggle" style="width: 20px; height: 20px;">
                    </button>
                    <ul class="dropdown-menu" style="">
                        <li>
                            <span class="fw-bold" style="color:black; padding: 12px 0px 12px 20px; display: block;">Statut</span>
                        </li>
                        <li>
                            <?php $user_controls_link[$user_statut_index]['value'] = "all"; ?>
                            <a href="<?= navigation_link($user_controls_link) ?>" class="header-link" style="color:black; padding: 12px 0px 12px 20px;">All</a>
                        </li>
                        <li>
                            <?php $user_controls_link[$user_statut_index]['value'] = 0; ?>
                            <a href="<?= navigation_link($user_controls_link) ?>" class="header-link" style="color:black; padding: 12px 0px 12px 20px;">Common user</a>
                        </li>
                        <li>
                            <?php $user_controls_link[$user_statut_index]['value'] = -1; ?>
                            <a href="<?= navigation_link($user_controls_link) ?>" class="header-link" style="color:black; padding: 12px 0px 12px 20px;">Deleted user</a>
                        </li>
                        <li>
                            <?php $user_controls_link[$user_statut_index]['value'] = 1; ?>
                            <a href="<?= navigation_link($user_controls_link) ?>" class="header-link" style="color:black; padding: 12px 0px 12px 20px;">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- user list  -->
            <?php if(empty($user_list)) { ?>
                <div class="text-center py-5">
                    <div class="d-flex flex-column align-items-center justify-content-center text-muted">
                        <img src="../assets/images/empty.png" alt="No data" style="width: 80px; height: 80px; opacity: 0.5;">
                        <h4 class="mt-3 fw-bold">Aucun utilisateur trouvé</h4>
                        <p class="mb-0" style="font-size: large;">La liste des utilisateurs est vide pour le moment.</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="user-list table-responsive mb-3">
                    <table class="table table-hover align-middle" style="white-space: nowrap;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Photo</th>
                                <th scope="col">Full name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Inscription date</th>
                                <th scope="col">Statut</th>
                                <th scope="col" class="text-center">Operation</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user_list as $user) { ?> 
                                <tr>
                                    <td class="text-center">
                                        <img src="<?= $user['u_image'] ?>" alt="User profile" style="width: 35px; height: 35px;">
                                    </td>
                                    <td><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></td>
                                    <td><?= $user['u_email'] ?></td>
                                    <td><?= $user['u_inscription_date'] ?></td>
                                    <td><?= statut_name($user['u_statut']) ?></td>
                                    <td class="">
                                        <?php if ($user_statut == -1) { ?>
                                            <div class="d-flex align-items-center justify-content-evenly">
                                                <?php $reset_user_link[$reset_user_index]['value'] = $user['user_id']; ?>
                                                <a href="<?= custom_navigation_link($reset_user_link) ?>" class="btn btn-primary fw-bold rounded-1 text-white" style="text-decoration: none; padding: 2px 12px 2px 12px;">
                                                    Restore
                                                </a>
                                            </div>
                                        <?php } else { ?>
                                            <!-- for user not deleted -->
                                            <div class="d-flex align-items-center justify-content-evenly">
                                                <?php include("../inc/edit-user_modal.php"); ?>
                                                <?php
                                                    $delete_user_link[$delete_user_index]['value'] = $user['user_id'];
                                                    $modal_confirm = modal_confirmation("Delete confirmation", "first_delete_" . $user['user_id'], custom_navigation_link($delete_user_link));
                                                ?>
                                                <button class="rounded-pill d-flex align-items-center border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#<?= $modal_confirm['id'] ?>">
                                                    <img src="../assets/images/trash.png" alt="Delete profile" style="width: 35px; height: 35px; padding: 5px;">
                                                </button>
                                                <?php include("../inc/confirm_modal.php") ?>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($user_statut == -1) { ?>
                                            <?php 
                                                $corbeille_link[$corbeille_user_index]['value'] = $user['user_id'];
                                                $modal_confirm = modal_confirmation("Delete confirmation", "second_delete_" . $user['user_id'],custom_navigation_link($corbeille_link));
                                            ?>
                                            <button class="btn btn-danger fw-bold rounded-1 text-white" style="text-decoration: none; padding: 2px 12px 2px 12px;" data-bs-toggle="modal" data-bs-target="#<?= $modal_confirm['id'] ?>">
                                                Delete
                                            </button>
                                            <?php include("../inc/confirm_modal.php"); ?>
                                        <?php } else { ?>
                                            <?php 
                                                $login_link[$login_index]['value'] = $user['user_id'];
                                                $modal_confirm = modal_confirmation("Login confirmation", "login_" . $user['user_id'], custom_navigation_link($login_link));
                                            ?>
                                            <button class="btn btn-primary fw-bold rounded-1 text-white" style="text-decoration: none; padding: 2px 12px 2px 12px;" data-bs-toggle="modal" data-bs-target="#<?= $modal_confirm['id'] ?>">
                                                Login
                                            </button>
                                            <?php include("../inc/confirm_modal.php"); ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            
            <?php if ($total_page > 1) { ?>
                <!-- pagination div -->
                <div class="pagination-div">
                    <!-- link for pagination -->
                    <?php 
                        $pagination_link = array();
                        $pagination_link[] = array('key' => 'page', 'value' => 'user_management.php');
                        $pagination_link[] = array('key' => 'user_statut', 'value' => $user_statut);
                        $pagination_link[] = array('key' => 'index_pagination', 'value' => null);
                        $pagination_link_index = get_index($pagination_link, "index_pagination");
                    ?>
                    <?php include('../inc/pagination_web.php'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>