<?php 
    //return link 
    $return_link = array();
    $return_link[] = array('key' => 'page', 'value' => null);
    $return_page_index = get_index($return_link, 'page');
?>
<section class="div-container">
    <div class="m-auto col-12 col-lg-9">
        <div class="d-flex align-items-center gap-2 mb-3">
            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
            <a href="<?= navigation_link($return_link) ?>" class="d-flex align-items-center return-button rounded-circle">
                <img src="../assets/images/return-arrow.png" alt="" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">Create post</h1>
        </div>
    </div>
    <div class="m-auto col-12 col-lg-9">
        <form action="traitement_create_post.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title<span style="color: red;">*</span></label>
                <textarea class="form-control" id="title" name="s_title" rows="2" style="resize: none; border-radius: 22px; border: 1px solid #00000033" placeholder="Title*" required></textarea>
            </div>
            <div class="mb-3">
                <div for="image" class="border-dotted" style="width: 100%; border-radius: 22px;">
                    <div class="d-flex align-items-center justify-content-center gap-2" style="padding: 55px 10px 55px 10px;">
                        <input type="file" class="form-control"  id="image" name="s_media" accept="image/jpeg, image/png, image/jpg, video/mp4">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="content" name="s_content" rows="6" style="resize: none; border-radius: 22px; border: 1px solid #00000033" placeholder="Body text (optional)"></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="comment-button fw-bold" style="border-radius: 20px;padding: 8px 14px 8px 14px;">Post</button>
            </div>
        </form>
    </div>
</section>