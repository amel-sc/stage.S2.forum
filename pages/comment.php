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
        $comment_other_condition[] = "ORDER BY c_date DESC";
        // comment list condition
        $comment_condition = array();
        $comment_condition[] = array('key' => 'subject_id', 'value' => $_GET['subject_id']);
        // comment list
        $comments = select_table("v_comment_user", $comment_condition, $comment_other_condition);

        // navigation link 
        $link = array();
        $link[] = array('key' => 'page', 'value' => "home.php");
    }
?>

<section class="p_container" style="margin-top: 75px;">
    <!-- post's card -->
    <div class="card card-post-selected col-12 col-lg-9 mb-1 m-auto border-0 rounded-4">
        <div class="card-body">
            <!-- sender info (user img, name , sended_date) -->
            <div class="post-info d-flex align-items-center gap-2 mb-2">
                <a href="<?= navigation_link($link) ?>" class="return-button rounded-circle">
                    <img src="../assets/images/return-arrow.png" alt="" style="width: 20px; height: 20px;">
                </a>
                <img src="<?= $subject[0]['u_image'] ?>" alt="" style="width: 40px; height: 40px">
                <div class="">
                    <p class="m-0">
                        <span class="fw-bold"><?= $subject[0]['u_last_name'] ?> <?= $subject[0]['u_first_name'] ?></span> 
                        <span class="dot"></span>
                        <span style="color: #595959;"><?= $subject[0]['s_date'] ?></span>
                    </p>
                </div>
            </div>
            <!-- post content -->
            <div class="post-content">
                <h4 class="card-title fw-bold"><?= $subject[0]['s_title'] ?></h4>
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
                <form action="traitement_comment.php" method="get">
                    <textarea class="form-control mb-2" id="comment-textarea" name="c_content" rows="2" style="resize: none;" required></textarea>
                    <!-- hidden values to send -->
                    <input type="hidden" name="subject_id" value="<?= $subject[0]['subject_id'] ?>">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="rounded-pill comment-button fw-bold">Send</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</section>

<!-- comments -->
<section class="comment_container mb-3">
    <h2 class="col-12 col-lg-9 m-auto" style="padding: 0px 0px 0px 25px;"><span class="fw-bold"><?= count($comments) ?></span> Comments</h2>
    <!-- separator -->
    <hr class="hr-design col-12 col-lg-9">

    <?php foreach ($comments as $item) { ?>
        <div class="card card-comment col-12 col-lg-9 border-0 mb-2 m-auto">
            <div class="card-body">
                <!-- sender info (user img, name , sended_date) -->
                <div class="comment-info d-flex align-items-center gap-2 mb-1">
                    <img src="<?= $item['u_image'] ?>" alt="" style="width: 40px; height: 40px">
                    <div class="">
                        <p class="m-0">
                            <span class="fw-bold"><?= $item['u_last_name'] ?> <?= $item['u_first_name'] ?></span> 
                            <span class="dot"></span>
                            <span style="color: #595959;"><?= $item['c_date'] ?></span>
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