<!-- pagination for big screen (>= 992px) -->
<div class="d-none d-lg-block">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end m-0">
            <!-- previous page -->
            <?php if ($index_pagination > 1) { ?>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = 1 ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">First</a>
                </li>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = $index_pagination - 1 ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">Previous</a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                    <a class="page-link" >First</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" >Previous</a>
                </li>
            <?php } ?>
    
            <!-- page numbers -->
            <?php for ($i = $index_pagination - 8; $i <= $index_pagination + 8; $i++) { ?>
                <?php if ($i >= 1) { ?>
                <!-- end condition -->
                <?php if ($i > $total_page) break; ?>
                <!-- current page  -->
                <?php if ($i == $index_pagination) { ?>
                    <?php $pagination_link[$pagination_link_index]['value'] = $i; ?>
                    <li class="page-item active"><a class="page-link" href="<?= navigation_link($pagination_link) ?>"><?= $i ?></a></li>
                <?php } else { ?>
                    <?php $pagination_link[$pagination_link_index]['value'] = $i; ?>
                        <li class="page-item"><a class="page-link" href="<?= navigation_link($pagination_link) ?>"><?= $i ?></a></li>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
    
            <!-- next page -->
            <?php if ($index_pagination < $total_page) { ?>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = $index_pagination + 1 ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">Next</a>
                </li>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = $total_page ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">Last</a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                    <a class="page-link" >Next</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" >Last</a>
                </li>
            <?php } ?> 
        </ul>
    </nav>
</div>
<!-- pagination for small screen (< 992px)  -->
 <div class="d-block d-lg-none">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm justify-content-center m-0">
            <!-- previous page -->
            <?php if ($index_pagination > 1) { ?>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = 1 ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">First</a>
                </li>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = $index_pagination - 1 ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">Previous</a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                    <a class="page-link" >First</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" >Previous</a>
                </li>
            <?php } ?>
    
            <!-- page numbers -->
            <?php for ($i = $index_pagination - 1; $i <= $index_pagination + 1; $i++) { ?>
                <?php if ($i >= 1) { ?>
                <!-- end condition -->
                <?php if ($i > $total_page) break; ?>
                <!-- current page  -->
                <?php if ($i == $index_pagination) { ?>
                    <?php $pagination_link[$pagination_link_index]['value'] = $i; ?>
                    <li class="page-item active"><a class="page-link" href="<?= navigation_link($pagination_link) ?>"><?= $i ?></a></li>
                <?php } else { ?>
                    <?php $pagination_link[$pagination_link_index]['value'] = $i; ?>
                        <li class="page-item"><a class="page-link" href="<?= navigation_link($pagination_link) ?>"><?= $i ?></a></li>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
    
            <!-- next page -->
            <?php if ($index_pagination < $total_page) { ?>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = $index_pagination + 1 ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">Next</a>
                </li>
                <li class="page-item">
                    <?php $pagination_link[$pagination_link_index]['value'] = $total_page ?>
                    <a class="page-link" href="<?= navigation_link($pagination_link) ?>">Last</a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                    <a class="page-link" >Next</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" >Last</a>
                </li>
            <?php } ?> 
        </ul>
    </nav>
</div>