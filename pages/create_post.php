<section class="div-container">
    <h1 class="fw-medium m-auto col-12 col-lg-7 mb-3">Create Post</h1>
    <div class="m-auto col-12 col-lg-7">
        <form action="traitement_create_post.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title<span style="color: red;">*</span></label>
                <textarea class="form-control" id="title" name="s_title" rows="2" style="resize: none; border-radius: 22px; border: 1px solid #00000033" placeholder="Title*" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="border-dotted" style="width: 100%; border-radius: 22px;">
                    <div class="d-flex align-items-center justify-content-center gap-2" style="padding: 55px;">
                        <span>Upload media</span>
                        <img src="../assets/images/upload.png" alt="" class="rounded-circle header-link" style="width: 35px; height: 35px; padding: 5px;">
                    </div>
                </label>
                <input type="file" class="" id="image" name="image" accept="image/*" required hidden>
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="title" name="s_title" rows="6" style="resize: none; border-radius: 22px; border: 1px solid #00000033" placeholder="Body text (optional)" required></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="comment-button fw-bold" style="border-radius: 20px;padding: 8px 14px 8px 14px;">Post</button>
            </div>
        </form>
    </div>
</section>