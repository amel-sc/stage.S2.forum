<?php 
    if(isset($_GET['subject_id']))
    {
        // post clicked info
        // post clicked condition
        $subject_condition = array();
        $subject_condition[] = array('key' => 'subject_id', 'value' => $_GET['subject_id']);
        // request result
        $subject = select_table("v_subject_user", $subject_condition, null);

        // comment list other condition
        $comment_other_condition = [];
        $order_name = null;
        if (isset($_GET['order']))
        {
            $comment_other_condition[] = "ORDER BY c_date " . $_GET['order'];
            $order_name = $_GET['order'];
        }
        else 
        {
            $comment_other_condition[] = "ORDER BY c_date DESC";
            $order_name = "DESC";
        }
        // comment list condition
        $comment_condition = array();
        $comment_condition[] = array('key' => 'subject_id', 'value' => $_GET['subject_id']);
        // comment list
        $comments = select_table("v_comment_user", $comment_condition, $comment_other_condition);

        //return link 
        $return_link = array();
        $return_link[] = array('key' => 'page', 'value' => null);
        $return_page_index = get_index($return_link, 'page');
        // navigation link for profil
        $link_profil = array();
        $link_profil[] = array('key' => 'page', 'value' => "profile.php");
        $link_profil[] = array('key' => 'user_id', 'value' => null);
        $user_id_index = get_index($link_profil, "user_id");
        // order link for order
        $link_order = array();
        $link_order[] = array('key' => 'page', 'value' => "comment.php");
        $link_order[] = array('key' => 'subject_id', 'value' => $_GET['subject_id']);
        $link_order[] = array('key' => 'order', 'value' => null);
        $order_index = get_index($link_order, "order");
    }
?>

<section class="div-container">
    <div class="content col-12 col-lg-9 m-auto mb-3">
        <div class="d-flex align-items-center gap-2 mb-3">
            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
            <a href="<?= navigation_link($return_link) ?>" class="d-flex align-items-center return-button rounded-circle">
                <img src="../assets/images/return-arrow.png" alt="User profile" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">Post</h1>
        </div>

        <div class="post-comment-container rounded-4">
            <!-- post's card -->
            <div class="card card-post-selected mb-1 border-0 rounded-4">
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
                    <!-- comment number and button to comment -->
                    <div class="post-comment mt-3 mb-3 d-flex justify-content-between align-items-center">
                        <!-- commment number -->
                        <?php $comments_number = get_comment_by_subject($subject[0]['subject_id']); ?>
                        <!-- link to comment  -->
                        <label class="d-flex align-items-center gap-2 rounded-pill comment-link" for="comment-textarea" style="cursor: pointer;">
                            <img src="../assets/images/comment.png" alt="" style="width: 20px; height: 20px">
                            <span class="text-black fw-bold"><?= count($comments_number) ?></span>
                        </label>
                    </div>
                    <!-- input comment -->
                    <div class="mb-3">
                        <div class="show-comment rounded-pill" id="show-comment">
                            <span class="text">Join the converation</span>
                        </div>
                        <div class="comment-input d-none" id="comment-input">
                            <form action="traitement_comment.php" method="post">
                                <div style="padding: 12px 16px;">
                                    <textarea name="c_content" id="autoResize" rows="1" placeholder="Join the conversation" required></textarea>
                                </div>
                                <!-- hidden values to send -->
                                <input type="hidden" name="subject_id" value="<?= $subject[0]['subject_id'] ?>">
                                <div class="gap-1 d-flex justify-content-end" style="padding: 4px 8px;">
                                    <button class="btn btn-light rounded-pill fw-bold" type="button" id="hide-comment">Cancel</button>
                                    <button class="btn btn-secondary rounded-pill fw-bold" type="submit">Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- comments header -->
            <div class="comment-container">
                <!-- sort by -->
                <div class="d-flex align-items-center gap-2 mb-3" style="padding: 0px 0px 0px 0px;">
                    <p class="m-0">Sort by:</p>
                    <div class="dropdown">
                        <button class="dropdown-toggle header-link rounded-pill px-3 py-2 custom-btn fw-bold" id="dropdown-show-button" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none;">
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
                <!-- comments container -->
                <?php foreach ($comments as $item) { ?>
                    <div class="card card-comment border-end-0 border-bottom-0 border-start-0 rounded-top-0">
                        <div class="card-body mb-3 mt-3" style="padding: 0;">
                            <!-- sender info (user img, name , sended_date) -->
                            <div class="comment-info d-flex align-items-center gap-2 mb-2">
                                <img src="<?= $item['u_image'] ?>" alt="" style="width: 35px; height: 35px">
                                <div class="">
                                    <p class="m-0">
                                        <?php $link_profil[$user_id_index]['value'] = $item['user_id'] ?>
                                        <a class="profile-link" href="<?= navigation_link($link_profil) ?>">
                                            <?= $item['u_last_name'] ?> <?= $item['u_first_name'] ?>
                                        </a>
                                        <span class="dot my-0">•</span>
                                        <span class="post-date"><?= $item['c_date'] ?></span>
                                    </p>
                                </div>
                            </div>
                            <!-- post content -->
                            <div class="comment-content">
                                <p class="card-text"><?= $item['c_content'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<script src="../assets/js/comment.js"></script>
<script src="../assets/js/home.js"></script>