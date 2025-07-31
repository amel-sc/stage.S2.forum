<?php 
    if(isset($_GET['subject_id']))
    {
        // post clicked info
        //  post clicked condition
        $condition = array();
        $condition[] = array('key' => 'subject_id', 'value' => $_GET['subject_id']);
        // request result
        $subject = select_table("v_subject_user", $condition, null);

        // navigation link 
        $link = array();
        $link[] = array('key' => 'page', 'value' => "home.php");
    }
?>

<section class="p_container mt-3">
    <!-- post's card -->
    <div class="card card-post w-75 mb-3 m-auto border-0 rounded-1">
        <div class="card-body">
            <!-- sender info (user img, name , sended_date) -->
            <div class="post-info d-flex mb-3">
                <img src="<?= $subject[0]['u_image'] ?>" alt="" style="width: 65px; height: 65px">
                <div class="sender-info d-flex flex-column justify-content-between">
                    <p class="m-0"><?= $subject[0]['u_last_name'] ?> <?= $subject[0]['u_first_name'] ?></p>
                    <p class="m-0"><?= $subject[0]['s_date'] ?></p>
                </div>
            </div>
            <!-- post content -->
            <div class="post-content">
                <h5 class="card-title fw-bold"><?= $subject[0]['s_title'] ?></h5>
                <p class="card-text"><?= $subject[0]['s_content'] ?></p>
            </div>
            <!-- comment number and button to comment -->
            <div class="post-comment mt-3 mb-3 d-flex justify-content-between align-items-center">
                <!-- link to comment  -->
                <a href="<?= navigation_link($link) ?>" class="btn btn-primary">Return</a>
                <!-- commment number -->
                <?php $comments = get_comment_by_subject($subject[0]['subject_id']); ?>
                <p class="m-0"><span class="fw-bold"><?= count($comments) ?></span> Comments</p>
            </div>
            <!-- input comment -->
            <div class="input-comment mb-3 border rounded-3">
                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="2" style="resize: none;"></textarea>
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-primary">Send</a>
                </div>
            </div>
        </div>
    </div>
</section>