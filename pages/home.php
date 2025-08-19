<?php
    $current_user = $_SESSION['current_user'];
    // subject 
    // forum subject list other condition
    $other_condition = [];
    $order_name = null;
    if (isset($_GET['order']))
    {
        $other_condition[] = "ORDER BY s_date " . $_GET['order'];
        $order_name = $_GET['order'];
    }
    else 
    {
        $other_condition[] = "ORDER BY s_date DESC";
        $order_name = "DESC";
    }
    // forum_subject condition
    $condition = [];
    $condition[] = array('key' => 's_statut', 'operation' => '=', 'value' => 0);
    // permission condition 
    $permission_condition = '(SELECT subject_id FROM post_permission WHERE user_id=' . $current_user['user_id'] . ' AND p_statut=1)';
    $condition[] = array('key' => 'subject_id', 'operation' => 'NOT IN', 'value' => $permission_condition);
    // forum subject
    echo select_table_operation_sql("v_subject_user", $condition, $other_condition);
    $subject = select_table_operation("v_subject_user", $condition, $other_condition);

    // navigation link for post
    $link_comment = array();
    $link_comment[] = array('key' => 'page', 'value' => "comment.php");
    $link_comment[] = array('key' => 'subject_id', 'value' => null);
    $subject_id_index = get_index($link_comment, "subject_id");
    // navigation link for profil
    $link_profil = array();
    $link_profil[] = array('key' => 'page', 'value' => "profile.php");
    $link_profil[] = array('key' => 'user_id', 'value' => null);
    $user_id_index = get_index($link_profil, "user_id");
    // order link for post
    $link_order = array();
    $link_order[] = array('key' => 'page', 'value' => "home.php");
    $link_order[] = array('key' => 'order', 'value' => null);
    $order_index = get_index($link_order, "order");
    // post parameter link
    $link_post_edit = array();
    $link_post_edit[] = array('key' => 'page', 'value' => 'edit_post.php');
    $link_post_edit[] = array('key' => 'subject_id', 'value' => null);
    $post_edit_index = get_index($link_post_edit, "subject_id");
?>

<section class="div-container">
    <div class="content col-12 col-lg-9 m-auto mb-3">
        <div class="post_container rounded-4">
            <!-- sort by -->
            <div class="d-flex align-items-center gap-1 mb-3">
                <p class="m-0">Sort by : </p>
                <div class="d-block dropdown">
                    <button class="dropdown-toggle header-link rounded-pill px-3 py-2 custom-btn" id="dropdown-show-button" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none;">
                        <?= order_name($order_name) ?>
                    </button>
                    <ul class="dropdown-menu" style="min-width: 100px;">
                        <li>
                            <span class="fw-bold" style="color:black; padding: 12px 0px 12px 20px; display: block;">Sort by</span>
                        </li>
                        <li>
                            <?php $link_order[$order_index]['value'] = "DESC" ?>
                            <a href="<?= navigation_link($link_order) ?>" class="header-link" style="color:black; padding: 12px 0px 12px 20px;">New</a>
                        </li>
                        <li>
                            <?php $link_order[$order_index]['value'] = "ASC" ?>
                            <a href="<?= navigation_link($link_order) ?>" class="header-link" style="color:black; padding: 12px 0px 12px 20px;">Old</a>
                        </li>
                    </ul>
                </div>
            </div>
        
         
            <?php foreach ($subject as $item) { ?>
                <!-- link to comment  -->
                <?php $link_comment[$subject_id_index]['value'] = $item['subject_id']; ?>
                <!-- post's card -->
                 
                <div class="card card-post border-top-0 border-end-0 border-start-0 rounded-4 position-relative">
                    <a href="<?= navigation_link($link_comment) ?>" class="text-decoration-none text-black stretched-link" style="">
                        <div class="card-body">
                            <!-- sender info (user img, name , sended_date) -->
                            <div class="post-info d-flex align-items-center gap-2 mb-3">
                                <img src="<?= $item['u_image'] ?>" alt="" style="width: 40px; height: 40px">
                                <div class="">
                                    <p class="m-0">
                                        <?php $link_profil[$user_id_index]['value'] = $item['user_id'] ?>
                                        <a class="profile-link" href="<?= navigation_link($link_profil) ?>" style="position: relative; z-index: 1000;">
                                            <?= $item['u_last_name'] ?> <?= $item['u_first_name'] ?>
                                        </a>
                                        <span class="dot my-0">•</span>
                                        <span class="post-date"><?= $item['s_date'] ?></span>
                                    </p>
                                </div>
                            </div>
                            <!-- post content -->
                            <div class="post-content">
                                <h4 class="card-title fw-bold"><?= $item['s_title'] ?></h4>
                                <!-- video or image of the post -->
                                <?php if ($item['s_media'] != "empty") { ?>
                                    <?php if(strpos($item['s_media'], ".mp4") == false) { ?>
                                        <div class="media-wrapper" style="margin: auto;">
                                            <img class="" src="<?= $item['s_media'] ?>" alt="..." style="z-index: 1000;">
                                        </div>
                                    <?php } else { ?>
                                        <div class="media-wrapper" style="margin: auto;">
                                            <video class="" controls style="z-index: 1000;">
                                                <source src="<?= htmlspecialchars($item['s_media']) ?>" type="video/mp4">
                                                Votre navigateur ne supporte pas la lecture vidéo.
                                            </video>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <p class="card-text"><?= $item['s_content'] ?></p>
                            </div>
                            <!-- comment number and button to comment -->
                            <div class="post-comment mt-3 d-flex align-items-start">
                                <!-- commment number -->
                                <?php $comments_number = get_comment_by_subject($item['subject_id']); ?>
                                <a href="<?= navigation_link($link_comment) ?>" class="d-flex align-items-center gap-2 rounded-pill comment-link" style="position: relative; z-index: 1000;">
                                    <img src="../assets/images/comment.png" alt="" style="width: 20px; height: 20px">
                                    <span class="text-black fw-bold"><?= count($comments_number) ?></span>
                                </a>
                            </div>
                            <!-- post parameter for selecting who can see/not the post -->
                            <?php if ($item['user_id'] == $current_user['user_id']) { ?>
                                <div class="mt-3">
                                    <?php $link_post_edit[$post_edit_index]['value'] = $item['subject_id']; ?>
                                    <a href="<?= navigation_link($link_post_edit) ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" style="position: relative;z-index: 1000;">
                                        Edit post
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<script src="../assets/js/image_post.js"></script>
<script src="../assets/js/home.js"></script>
