<?php 
    // all user list
    $user_list = select_table("user", null, null);
?>
<section class="div-container">
    <div class="table-responsive" style="box-shadow: 0px 0px 0px 2px #f2f2f2;">
        <table class="table table-hover border m-0 align-middle" style="white-space: nowrap;">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Photo</th>
                    <th scope="col">User name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Operation</th>
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
                        <td class="text-center">...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>