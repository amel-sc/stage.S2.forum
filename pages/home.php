<?php
    // subject list
    $subject = select_table("subject", null, null);
?>

<section class="d_container">
    <h1 class="text-center fw-bold">Forum</h1>
    <?php foreach ($subject as $item) { ?>
        <div class="card w-75 mb-3 m-auto">
            <div class="card-body">
                <h5 class="card-title"><?= $item['s_title'] ?></h5>
                <p class="card-text"><?= $item['s_content'] ?></p>
                <a href="#" class="btn btn-primary">Comment</a>
            </div>
        </div>
    <?php } ?>

</section>