<?php 
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
    // all user list
    $user_list = select_table("user", $user_list_condition, null);

    // user / admin list navigation link
    $user_statut_link = array();
    $user_statut_link[] = array('key' => 'page', 'value' => "user_management.php");
    $user_statut_link[] = array('key' => 'user_statut', 'value' => null);
    $user_statut_index = get_index($user_statut_link, "user_statut");
?>
<section class="div-container">
    <!-- user management navigation link -->
    <?php if ($user_statut == 0) { ?>
        <div class="nav_management rounded-2 mb-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; display: inline-block; padding: 0px 20px 0px 20px;">
            <ul class="nav nav-underline">
                <li class="nav-item text-center">
                    <?php $user_statut_link[$user_statut_index]['value'] = 0; ?>
                    <a class="nav-link active" href="<?= navigation_link($user_statut_link) ?>" style="padding: 20px 15px 15px 15px;">Users</a>
                </li>
                <li class="nav-item">
                    <?php $user_statut_link[$user_statut_index]['value'] = 1 ?>
                    <a class="nav-link" href="<?= navigation_link($user_statut_link) ?>" style="padding: 20px 15px 15px 15px;">Admins</a>
                </li>
            </ul>
        </div>
    <?php } else if ($user_statut == 1) { ?>
        <div class="nav_management rounded-2 mb-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; display: inline-block; padding: 0px 20px 0px 20px;">
            <ul class="nav nav-underline">
                <li class="nav-item text-center">
                    <?php $user_statut_link[$user_statut_index]['value'] = 0; ?>
                    <a class="nav-link" href="<?= navigation_link($user_statut_link) ?>" style="padding: 20px 15px 15px 15px;">Users</a>
                </li>
                <li class="nav-item">
                    <?php $user_statut_link[$user_statut_index]['value'] = 1 ?>
                    <a class="nav-link active" href="<?= navigation_link($user_statut_link) ?>" style="padding: 20px 15px 15px 15px;">Admins</a>
                </li>
            </ul>
        </div>
    <?php } ?>
    <!-- user management header -->
    <div class="ms-4 d-flex align-items-center gap-4 management_header mb-3">
        <h1>Users</h1>
        <button class="btn btn-primary rounded-1 fw-bold" style="padding: 10px 20px 10px 20px;">Add new</button>
    </div>
    <!-- user list -->
    <div class="table-responsive" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
        <table class="table m-0 align-middle" style="white-space: nowrap;">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Photo</th>
                    <th scope="col">User name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
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
                        <td><?= statut_name($user['u_statut']) ?></td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-evenly">
                                <a class="rounded-pill d-flex align-items-center header-link" href="#"> 
                                    <img src="../assets/images/edit.png" alt="Edit profile" style="width: 35px; height: 35px; padding: 5px;">
                                </a>
                                <a class="rounded-pill d-flex align-items-center header-link" href="#">
                                    <img src="../assets/images/trash.png" alt="Delete profile" style="width: 35px; height: 35px; padding: 5px;">
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-primary fw-bold rounded-1" style="padding: 2px 12px 2px 12px;">Login</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>