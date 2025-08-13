
<!-- Modal -->
<div class="modal fade" id="<?= $modal_confirm['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $modal_confirm['header'] ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-auto" style="padding: 30px 0px 55px 0px;">
                <p class="mb-4">Are you sure you want to continue?</p>
                <div class="d-flex justify-content-between align-items-center">
                    <a role="button" class="btn btn-success rounded-1 text-white" href="<?= $modal_confirm['link'] ?>" style="text-decoration: none; padding: 12px 45px 12px 45px;">Yes</a>
                    <button type="button" class="btn btn-danger text-white rounded-1" data-bs-dismiss="modal" style="padding: 12px 45px 12px 45px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>