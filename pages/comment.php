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

        // navigation link 
        $link_home = array();
        $link_home[] = array('key' => 'page', 'value' => "home.php");
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
    <!-- post's card -->
    <div class="card card-post-selected col-12 col-lg-9 mb-1 m-auto border-0 rounded-4">
        <div class="card-body">
            <!-- sender info (user img, name , sended_date) -->
            <div class="post-info d-flex align-items-center gap-2 mb-2">
                <a href="<?= navigation_link($link_home) ?>" class="m-0 return-button rounded-circle">
                    <img src="../assets/images/return-arrow.png" alt="" style="width: 20px;">
                </a>
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
                                <img class="col-12 col-md-7" src="<?= $subject[0]['s_media'] ?>" alt="..." style="object-fit: contain;">
                            </div>
                        <?php } else { ?>
                            <div class="d-flex align-items-center justify-content-center" style="margin: auto;">
                                <video class="col-12 col-md-7" controls style="object-fit: contain;">
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
                <label class="d-flex align-items-center gap-2 rounded-pill comment-link" for="comment-textarea">
                    <img src="../assets/images/comment.png" alt="" style="width: 20px; height: 20px">
                    <span class="text-black fw-bold"><?= count($comments_number) ?></span>
                </label>
            </div>
            <!-- input comment -->
            <div class="input-comment mb-3 border border-dark-subtle rounded-3">
                <form action="traitement_comment.php" method="post">
                    <textarea class="form-control mb-2" id="comment-textarea" name="c_content" rows="2" style="resize: none;" placeholder="Join the conversation" required></textarea>
                    <!-- hidden values to send -->
                    <input type="hidden" name="subject_id" value="<?= $subject[0]['subject_id'] ?>">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="rounded-pill comment-button fw-bold">Comment</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</section>

<!-- comments -->
<section class="comment_container mb-3">
    <h2 class="col-12 col-lg-9 m-auto" style="padding: 0px 0px 0px 25px;"><span class="fw-bold"><?= count($comments) ?></span> Comments</h2>
    <!-- sort by -->
    <div class="col-12 col-lg-9 m-auto d-flex align-items-center gap-2" style="padding: 0px 0px 0px 25px;">
        <p class="m-0">Sort by:</p>
        <div class="dropdown">
            <button class="dropdown-toggle header-link rounded-pill px-3 py-2 custom-btn fw-bold" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none;">
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
    <!-- separator -->
    <hr class="hr-design col-12 col-lg-9">

    <?php foreach ($comments as $item) { ?>
        <div class="card card-comment col-12 col-lg-9 border-0 mb-0 m-auto">
            <div class="card-body">
                <!-- sender info (user img, name , sended_date) -->
                <div class="comment-info d-flex align-items-center gap-2 mb-1">
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
</section>