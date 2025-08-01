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

<section class="p_container mb-2" style="margin-top: 75px;">
    <!-- post's card -->
    <div class="card card-post-selected col-12 col-lg-9 mb-3 m-auto border-0 rounded-4">
        <div class="card-body">
            <!-- sender info (user img, name , sended_date) -->
            <div class="post-info d-flex mb-3">
                <img src="<?= $subject[0]['u_image'] ?>" alt="" style="width: 65px; height: 65px">
                <div class="sender-info d-flex flex-column justify-content-between">
                    <p class="m-0 fw-medium"><?= $subject[0]['u_last_name'] ?> <?= $subject[0]['u_first_name'] ?></p>
                    <p class="m-0"><?= $subject[0]['s_date'] ?></p>
                </div>
            </div>
            <!-- post content -->
            <div class="post-content">
                <h4 class="card-title fw-bold"><?= $subject[0]['s_title'] ?></h4>
                <p class="card-text"><?= $subject[0]['s_content'] ?></p>
            </div>
            <!-- comment number and button to comment -->
            <div class="post-comment mt-3 mb-3 d-flex justify-content-between align-items-center">
                <!-- link to comment  -->
                <a href="<?= navigation_link($link) ?>" class="btn btn-primary">Return</a>
                <!-- commment number -->
                <?php $comments_number = get_comment_by_subject($subject[0]['subject_id']); ?>
                <p class="m-0"><span class="fw-bold"><?= count($comments_number) ?></span> Comments</p>
            </div>
            <!-- input comment -->
            <div class="input-comment mb-3 border rounded-3">
                <form action="traitement_comment.php" method="get">
                    <textarea class="form-control mb-2" id="" name="c_content" rows="2" style="resize: none;" required></textarea>
                    <!-- hidden values to send -->
                    <input type="hidden" name="subject_id" value="<?= $subject[0]['subject_id'] ?>">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="rounded-pill comment-button">Send</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</section>

<!-- comments -->
<section class="comment_container">
    <?php $comment_number = count($comments); ?>
    <h2 class="col-12 col-lg-9 m-auto"><span class="fw-bold"><?= $comment_number ?></span> Comments</h2>
    <?php foreach ($comments as $item) { ?>
        <div class="card card-comment col-12 col-lg-9 mb-3 rounded-1 m-auto">
            <div class="card-body">
                <!-- sender info (user img, name , sended_date) -->
                <div class="post-info d-flex mb-3">
                    <img src="<?= $item['u_image'] ?>" alt="" style="width: 55px; height: 55px">
                    <div class="sender-info d-flex flex-column justify-content-between">
                        <p class="m-0 fw-medium"><?= $item['u_last_name'] ?> <?= $item['u_first_name'] ?></p>
                        <p class="m-0"><?= $item['c_date'] ?></p>
                    </div>
                </div>
                <!-- post content -->
                <div class="post-content">
                    <p class="card-text"><?= $item['c_content'] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</section>