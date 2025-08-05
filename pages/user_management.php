<?php 
    // all user list
    $user_list = select_table("user", null, null);
?>
<section class="div-container">
    <table class="custom_table">
        <!-- table header -->
        <tr>
            <th>Photo</th>
            <th>User name</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Operation</th>
        </tr>
        <!-- table content -->
        <?php foreach ($user_list as $user) { ?>
            <tr>
                <td>
                    <img src="<?= $user['u_image'] ?>" alt="" style="width: 35px; height : 35px;">
                </td>
                <td><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></td>
                <td><?= $user['u_email'] ?></td>
                <td><?= statut_name($user['u_statut']) ?></td>
                <td>...</td>
            </tr>
        <?php } ?>
    </table>
</section>