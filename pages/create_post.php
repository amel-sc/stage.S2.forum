<?php 
    //return link 
    $return_link = array();
    $return_link[] = array('key' => 'page', 'value' => null);
    $return_page_index = get_index($return_link, 'page');
?>
<section class="div-container">
    <div class="content col-12 col-lg-9 m-auto mb-3">
        <!-- header  -->
        <div class="d-flex align-items-center gap-2 mb-3">
            <?php $return_link[$return_page_index]['value'] = 'home.php' ?>
            <a href="<?= navigation_link($return_link) ?>" class="d-flex align-items-center return-button rounded-circle">
                <img src="../assets/images/return-arrow.png" alt="" style="width: 25px; height: 25px;">
            </a>
            <h1 class="m-0" style="">Create post</h1>
        </div>
        <!-- create post container -->
        <div class="create-post_container rounded-4">
            <form action="traitement_create_post.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title<span style="color: red;">*</span></label>
                    <textarea class="form-control" id="title" name="s_title" rows="2" style="resize: none; border: 1px solid #00000033" placeholder="Title" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Content</label>
                    <textarea class="form-control" id="content" name="s_content" rows="8" style="resize: none; border: 1px solid #00000033" placeholder="Body text (optional)"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Image/Video</label>
                    <input type="file" class="form-control"  id="" name="s_media" accept="image/jpeg, image/png, image/jpg, video/mp4">
                </div>
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <a href="<?= navigation_link($return_link) ?>" class="fw-bold btn btn-secondary rounded-1">Cancel</a>
                    <button type="submit" class="fw-bold btn btn-primary rounded-1">Post</button>
                </div>
            </form>
        </div>
    </div>
</section>