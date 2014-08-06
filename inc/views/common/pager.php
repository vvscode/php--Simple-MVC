<?php
$current = isset($currentPage) ? $currentPage : 1;
$total = isset($totalPages) ? $totalPages : 1;
$linkFormat = isset($pagerLinkTpl) ? $pagerLinkTpl : '/page/{{PAGE}}';
?>
<ul class="pagination">
    <?php for ($i = 1; $i <= $total; $i++) { ?>
        <li class="<?= ($i == $current) ? 'active' : '' ?>"><a
                href="<?= str_replace('{{PAGE}}', $i, $linkFormat) ?>"><?= $i ?></a></li>
    <?php } ?>
</ul>