<?php
    $current_user = $_SESSION['current_user'];
    // post clicked info
    // post clicked condition
    $subject_condition = array();
    $subject_condition[] = array('key' => 'subject_id', 'value' => $_GET['subject_id']);
    // request result
    $subject = select_table("v_subject_user", $subject_condition, null);

    // user list other condition
    $user_list_other_condition = [];
    $user_list_other_condition[] = "ORDER BY u_last_name";
    // user list condition
    $user_list_condition = [];
    $user_list_condition[] = array('key' => 'user_id', 'operation' => '!=', 'value' => $current_user['user_id']);
    $user_list_condition[] = array('key' => 'u_statut', 'operation' => '!=', 'value' => -1);
    // result
    $user_list_sql = select_table_operation_sql('user', $user_list_condition, $user_list_other_condition);

    // create page
    $sql = $user_list_sql;
    $pagination = create_pagination($sql);
    $total_page = count($pagination);

    if (isset($_GET['index_pagination_post']))
    {
        // get one page result
        $index_pagination = $_GET['index_pagination_post'];
        $user_list = one_page_result($user_list_sql, $pagination, $index_pagination);
    }
    else 
    {
        // get first page result
        $index_pagination = 1;
        $user_list = one_page_result($user_list_sql, $pagination, $index_pagination);
    }

    // save the lastest value for header
    $_SESSION['index_pagination_post'] = $index_pagination;

    //return link 
    $return_link = array();
    $return_link[] = array('key' => 'page', 'value' => null);
    $return_page_index = get_index($return_link, 'page');
    // navigation link for profil
    $link_profil = array();
    $link_profil[] = array('key' => 'page', 'value' => "profile.php");
    $link_profil[] = array('key' => 'user_id', 'value' => null);
    $user_id_index = get_index($link_profil, "user_id");
?>

<section class="div-container">
    <div class="content col-12 col-lg-9 m-auto mb-3">
        <!-- return link -->
        <div class="d-flex align-items-center gap-2 mb-3">
            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
            <a href="<?= navigation_link($return_link) ?>" class="d-flex align-items-center return-button rounded-circle">
                <img src="../assets/images/return-arrow.png" alt="User profile" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">Post permission</h1>
        </div>
        <!-- edit post container  -->
        <div class="edit-profile rounded-4">
            <!-- post's card -->
            <div class="card card-post-selected mb-3 border-0 rounded-4">
                <div class="card-body" style="padding: 0;">
                    <!-- sender info (user img, name , sended_date) -->
                    <div class="post-info d-flex align-items-center gap-2 mb-2">
                        <img src="<?= $subject[0]['u_image'] ?>" alt="" style="width: 40px; height: 40px">
                        <div class="">
                            <p class="m-0">
                                <?php $link_profil[$user_id_index]['value'] = $subject[0]['user_id'] ?>
                                <a class="profile-link" href="<?= navigation_link($link_profil) ?>">
                                    <?= $subject[0]['u_last_name'] ?> <?= $subject[0]['u_first_name'] ?>
                                </a>
                                <span class="dot my-0">•</span>
                                <span class="post-date"><?= $subject[0]['s_date'] ?></span>
                            </p>
                        </div>
                    </div>
                    <!-- post content -->
                    <div class="post-content">
                        <h4 class="card-title fw-bold"><?= $subject[0]['s_title'] ?></h4>
                        <!-- video or image of the post -->
                            <?php if ($subject[0]['s_media'] != "empty") { ?>
                                <?php if(strpos($subject[0]['s_media'], ".mp4") == false) { ?>
                                    <div class="d-flex align-items-center justify-content-center" style="margin: auto;">
                                        <img class="col-12 col-md-7 object-fit-contain" src="<?= $subject[0]['s_media'] ?>" alt="..." style="">
                                    </div>
                                <?php } else { ?>
                                    <div class="d-flex align-items-center justify-content-center" style="margin: auto;">
                                        <video class="col-12 col-md-7 object-fit-contain" controls style="">
                                            <source src="<?= htmlspecialchars($subject[0]['s_media']) ?>" type="video/mp4">
                                            Votre navigateur ne supporte pas la lecture vidéo.
                                        </video>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <p class="card-text"><?= $subject[0]['s_content'] ?></p>
                    </div>
                    <!-- comment number -->
                    <div class="post-comment mt-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2 rounded-pill comment-link">
                            <img src="../assets/images/comment.png" alt="" style="width: 20px; height: 20px">
                            <span class="text-black fw-bold"><?= count(get_comment_by_subject($subject[0]['subject_id'])) ?></span>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- user list to check -->
            <div>
                <div class="user_list_header border-bottom">
                    <h5 class="fw-bold">Permission management</h5>
                </div>
                
                <div class="user_list_check" style="margin: 8px 0px 0px;">
                    <form action="traitement_edit_post.php" method="post">
                        <?php foreach($user_list as $user) { ?>
                            <!-- checked permission if 1 not checked if 0 -->
                            <?php $permission = get_post_permission($user['user_id'], $subject[0]['subject_id']) ?>
                            <?php if ($permission != null && $permission['p_statut'] == 1) { ?>
                                <label class="form-check mt-3" for="check_<?= $user['user_id'] ?>" id="input_container_<?= $user['user_id'] ?>" style="padding: 10px 0px 25px 40px; cursor: pointer;">
                                    <input class="form-check-input" style="width: 20px; height: 20px; cursor: pointer;" type="checkbox" value="<?= $user['user_id'] ?>-1" name="user_id[]" id="check_<?= $user['user_id'] ?>" onclick="checkbox_value('<?= $user['user_id'] ?>')" checked>
                                    <div class="form-check-label d-block">
                                        <div class="d-flex align-items-end gap-2 ms-4 mb-2">
                                            <img src="<?= $user['u_image'] ?>" alt="User Profile" class="rounded-circle" style="width: 50px; height: 50px">
                                            <div class="d-flex flex-column align-items-start justify-content-around">
                                                <p class="m-0 fw-bold" style="white-space: nowrap"><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></p>
                                                <p class="m-0 text-muted fw-bold" style="white-space: nowrap; font-size: 14px;"><?= $user['u_email'] ?></p>
                                            </div>
                                        </div>
                                        <p class="mb-0 ms-4 fw-bold" style="font-size: 14px;">Actual permission: <span class="fw-normal text-decoration-underline" id="check_value_<?= $user['user_id'] ?>"></span></p>
                                    </div>
                                </label>
                                <span class="small" id="check_value_<?= $user['user_id'] ?>"></span>
                            <?php } else { ?>
                                <label class="form-check mt-3" for="check_<?= $user['user_id'] ?>" id="input_container_<?= $user['user_id'] ?>" style="padding: 10px 0px 25px 40px; cursor: pointer;">
                                    <input class="form-check-input" style="width: 20px; height: 20px; cursor: pointer;" type="checkbox" value="<?= $user['user_id'] ?>-1" name="user_id[]" id="check_<?= $user['user_id'] ?>" onclick="checkbox_value('<?= $user['user_id'] ?>')">
                                    <div class="form-check-label d-block">
                                        <div class="d-flex align-items-end gap-2 ms-4 mb-2">
                                            <img src="<?= $user['u_image'] ?>" alt="User Profile" class="rounded-circle" style="width: 50px; height: 50px">
                                            <div class="d-flex flex-column align-items-start justify-content-around">
                                                <p class="m-0 fw-bold" style="white-space: nowrap"><?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?></p>
                                                <p class="m-0 text-muted fw-bold" style="white-space: nowrap;font-size: 14px;"><?= $user['u_email'] ?></p>
                                            </div>
                                        </div>
                                        <p class="mb-0 ms-4 fw-bold" style="font-size: 14px;">Actual permission: <span class="fw-normal text-decoration-underline" id="check_value_<?= $user['user_id'] ?>"></span></p>
                                    </div>
                                </label>
                            <?php } ?>
                        <?php } ?>
                        <!-- send the subject id as hidden -->
                        <input type="hidden" name="subject_id" value="<?= $subject[0]['subject_id'] ?>">
                        <div class="d-flex flex-column flex-sm-row gap-3 gap-sm-0 align-items-center justify-content-sm-between mt-3">
                            <div class="" style="">
                                <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
                                <a href="<?= navigation_link($return_link) ?>" class="btn btn-light btn-sm rounded-pill fw-bold" type="button">Cancel</a>
                                <button class="btn btn-secondary btn-sm rounded-pill fw-bold" type="submit">Validate</button>
                            </div>
                            <!-- pagination -->
                            <?php if ($total_page > 1) { ?>
                                <!-- pagination div -->
                                <div class="pagination-div">
                                    <!-- link for pagination -->
                                    <?php 
                                        $pagination_link = array();
                                        $pagination_link[] = array('key' => 'page', 'value' => 'edit_post.php');
                                        $pagination_link[] = array('key' => 'subject_id', 'value' => $subject[0]['subject_id']);
                                        $pagination_link[] = array('key' => 'index_pagination_post', 'value' => null);
                                        $pagination_link_index = get_index($pagination_link, "index_pagination_post");
                                    ?>
                                    <?php include('../inc/pagination_web.php'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- script to load checkbox when load the page -->
<script>
window.onload = function() {
    <?php foreach($user_list as $user) { ?>
        checkbox_value('<?= $user['user_id'] ?>');
    <?php } ?>
};
</script>

<script src="../assets/js/edit_post.js"></script>