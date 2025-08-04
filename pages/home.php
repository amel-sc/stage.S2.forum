<?php
    // subject 
    // forum subject list condition
    $other_condition = [];
    $other_condition[] = "ORDER BY s_date DESC";
    // forum subject list
    $subject = select_table("v_subject_user", null, $other_condition);

    // navigation link for post
    $link = array();
    $link[] = array('key' => 'page', 'value' => "comment.php");
    $link[] = array('key' => 'subject_id', 'value' => null);
    $subject_id_index = get_index($link, "subject_id");
    // navigation link for profil
    $link_profil = array();
    $link_profil[] = array('key' => 'page', 'value' => "profile.php");
    $link_profil[] = array('key' => 'user_id', 'value' => null);
    $user_id_index = get_index($link_profil, "user_id");
?>

<section class="div-container">
    <h1 class="text-center fw-bold"><?= count($subject) ?> Posts</h1>
    <?php foreach ($subject as $item) { ?>
        <!-- link to comment  -->
        <?php $link[$subject_id_index]['value'] = $item['subject_id']; ?>
        <!-- post's card -->
        
        <div class="card card-post col-12 col-lg-9 m-auto border-0 rounded-4 position-relative">
            <a href="<?= navigation_link($link) ?>" class="text-decoration-none text-black stretched-link" style="">
                <div class="card-body">
                    <!-- sender info (user img, name , sended_date) -->
                    <div class="post-info d-flex align-items-center gap-2 mb-3">
                        <img src="<?= $item['u_image'] ?>" alt="" style="width: 40px; height: 40px">
                        <div class="">
                            <p class="m-0">
                                <?php $link_profil[$user_id_index]['value'] = $item['user_id'] ?>
                                <a class="profile-link" href="<?= navigation_link($link_profil) ?>" style="position: relative; z-index: 10;">
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
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="img-fluid" src="<?= $item['s_media'] ?>" alt="..." style="object-fit: contain;">
                                </div>
                            <?php } else { ?>
                                <div class="d-flex align-items-center justify-content-center">
                                    <video autoplay muted loop playsinline class="img-fluid">
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
                        <a href="<?= navigation_link($link) ?>" class="d-flex align-items-center gap-2 rounded-pill comment-link" style="position: relative; z-index: 10;">
                            <img src="../assets/images/comment.png" alt="" style="width: 20px; height: 20px">
                            <span class="text-black fw-bold"><?= count($comments_number) ?></span>
                        </a>
                    </div>
                </div>
            </a>
        </div>

        <!-- separator -->
        <hr class="hr-design col-12 col-lg-9">

    <?php } ?>
</section>