<?php 
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
?>

<section class="div-container">
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
            </ul>
        </div>
    <?php } ?>
    <!-- user management header -->
    <div class="ms-4 d-flex align-items-center gap-4 management_header mb-3">
        <?php if ($user_statut == 0) { ?>
            <h1>Users</h1>
        <?php } else if ($user_statut == 1) { ?>
            <h1>Admins</h1>
        <?php } ?> 
        <button class="btn btn-primary rounded-1 fw-bold" style="padding: 10px 20px 10px 20px;">Add new</button>
    </div>
    <!-- user list -->
    <div class="table-responsive" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
        <table class="table m-0 align-middle" style="white-space: nowrap;">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Photo</th>
                    <th scope="col">
                        User name
                    </th>
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
                                <button class="rounded-pill d-flex align-items-center border-0 header-link" data-bs-toggle="modal" data-bs-target="<?= "#" . $user['user_id'] ?>"> 
                                    <img src="../assets/images/edit.png" alt="Edit profile" style="width: 35px; height: 35px; padding: 5px;">
                                </button>
                                <a class="rounded-pill d-flex align-items-center header-link" href="#">
                                    <img src="../assets/images/trash.png" alt="Delete profile" style="width: 35px; height: 35px; padding: 5px;">
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            <?php $login_link[$login_index]['value'] = $user['user_id']; ?>
                            <a href="<?= custom_navigation_link($login_link) ?>" class="btn btn-primary fw-bold rounded-1 text-white" style="text-decoration: none;padding: 2px 12px 2px 12px;">Login</a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="<?= $user['user_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?= $user['user_id'] . "label" ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <img src="<?= $user['u_image'] ?>" alt="User profile" class="img-profile" style="width: 90px; height: 90px;">
                                    </div>
                                    <div class="user-info">
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <div class="">
                                                    <label for="last_name" class="form-label">Last name</label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Name" required>
                                                </div>
                                                <div class="">
                                                    <label for="first_name" class="form-label">First name</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                                                </div>
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
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </tbody>
        </table>
    </div>
</section>