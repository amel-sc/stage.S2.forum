<?php
    // post clicked info
    // post clicked condition
    $subject_condition = array();
    $subject_condition[] = array('key' => 'subject_id', 'value' => $_GET['subject_id']);
    // request result
    $subject = select_table("v_subject_user", $subject_condition, null);

    // user list
    $user_list_other_condition = [];
    $user_list_other_condition[] = "ORDER BY u_last_name";
    // result
    $user_list = select_table('user', null, $user_list_other_condition);

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
            <h1 class="m-0" style="">Post</h1>
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
                <form action="traitement_edit_post.php" method="post">
                    <?php foreach($user_list as $user) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $user['user_id'] ?>" name="user_id[]" id="check_<?= $user['user_id'] ?>">
                            <label class="form-check-label" for="check_<?= $user['user_id'] ?>">
                                <?= $user['u_last_name'] ?> <?= $user['u_first_name'] ?>
                            </label>
                        </div>
                    <?php } ?>
                    <!-- send the subject id as hidden -->
                     <input type="hidden" name="subject_id" value="<?= $subject[0]['subject_id'] ?>">
                    <div class="gap-1 d-flex justify-content-start" style="padding: 4px 8px;">
                        <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
                        <a href="<?= navigation_link($return_link) ?>" class="btn btn-light btn-sm rounded-pill fw-bold" type="button">Cancel</a>
                        <button class="btn btn-secondary btn-sm rounded-pill fw-bold" type="submit">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>