<?php
    // subject 
    // forum subject list condition
    $other_condition = [];
    $other_condition[] = "ORDER BY s_date DESC";
    // forum subject list
    $subject = select_table("v_subject_user", null, $other_condition);

    // navigation link 
    $link = array();
    $link[] = array('key' => 'page', 'value' => "comment.php");
    $link[] = array('key' => 'subject_id', 'value' => null);
    $subject_id_index = get_index($link, "subject_id");
?>

<section class="d_container" style="margin-top: 75px;">
    <h1 class="text-center fw-bold"><?= count($subject) ?> Posts</h1>
    <?php foreach ($subject as $item) { ?>
        <!-- post's card -->
        <div class="card card-post col-12 col-lg-9 m-auto border-0 rounded-4">
            <div class="card-body">
                <!-- sender info (user img, name , sended_date) -->
                <div class="post-info d-flex align-items-center gap-2 mb-3">
                    <img src="<?= $item['u_image'] ?>" alt="" style="width: 40px; height: 40px">
                    <div class="">
                        <p class="m-0">
                            <span class="fw-bold"><?= $item['u_last_name'] ?> <?= $item['u_first_name'] ?></span> 
                            <span class="dot"></span>
                            <span style="color: #595959;"><?= $item['s_date'] ?></span>
                        </p>
                    </div>
                </div>
                <!-- post content -->
                <div class="post-content">
                    <h4 class="card-title fw-bold"><?= $item['s_title'] ?></h4>
                    <p class="card-text"><?= $item['s_content'] ?></p>
                </div>
                <!-- comment number and button to comment -->
                <div class="post-comment mt-3 d-flex justify-content-between align-items-center">
                    <!-- commment number -->
                    <?php $comments_number = get_comment_by_subject($item['subject_id']); ?>
                    <a href="">
                        <img src="" alt="">
                    </a>
                    <p class="m-0"><span class="fw-bold"><?= count($comments_number) ?></span> Comments</p>
                    <!-- link to comment  -->
                    <?php $link[$subject_id_index]['value'] = $item['subject_id']; ?>
                    <a href="<?= navigation_link($link) ?>" class="btn btn-primary">Comment</a>
                </div>
            </div>
        </div>

        <!-- separator -->
        <hr class="hr-design col-12 col-lg-9">

    <?php } ?>
</section>