<?php
    // subject 
    // forum subject list condition
    $other_condition = [];
    $other_condition[] = "ORDER BY s_date";
    // forum subject list
    $subject = select_table("v_subject_user", null, $other_condition);

    // navigation link 
    $link = array();
    $link[] = array('key' => 'page', 'value' => "comment.php");
    $link[] = array('key' => 'subject_id', 'value' => null);
    $subject_id_index = get_index($link, "subject_id");
?>

<section class="d_container">
    <h1 class="text-center fw-bold"><?= count($subject) ?> Posts</h1>
    <?php foreach ($subject as $item) { ?>
        <!-- post's card -->
        <div class="card card-post w-75 mb-3 m-auto border-0 rounded-1">
            <div class="card-body">
                <!-- sender info (user img, name , sended_date) -->
                <div class="post-info d-flex mb-3">
                    <img src="<?= $item['u_image'] ?>" alt="" style="width: 65px; height: 65px">
                    <div class="sender-info d-flex flex-column justify-content-between">
                        <p class="m-0"><?= $item['u_last_name'] ?> <?= $item['u_first_name'] ?></p>
                        <p class="m-0"><?= $item['s_date'] ?></p>
                    </div>
                </div>
                <!-- post content -->
                <div class="post-content">
                    <h5 class="card-title fw-bold"><?= $item['s_title'] ?></h5>
                    <p class="card-text"><?= $item['s_content'] ?></p>
                </div>
                <!-- comment number and button to comment -->
                <div class="post-comment mt-3 d-flex justify-content-between align-items-center">
                    <!-- commment number -->
                    <?php $comments = get_comment_by_subject($item['subject_id']); ?>
                    <p class="m-0"><span class="fw-bold"><?= count($comments) ?></span> Comments</p>
                    <!-- link to comment  -->
                    <?php $link[$subject_id_index]['value'] = $item['subject_id']; ?>
                    <a href="<?= navigation_link($link) ?>" class="btn btn-primary">Comment</a>
                </div>
            </div>
        </div>
    <?php } ?>
</section>