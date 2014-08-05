<?php
/**
 * @var $this View
 */

?>

<?php
$this->renderPartial('guestbook/parts/form');
?>

<div class="messages">
    <?php foreach($this->messages as $msg){
        $this->renderPartial('guestbook/parts/message', array('message' => $msg));
     } ?>
</div>

<?php
    $this->renderPartial('common/pager', array(
        'currentPage' => $this->currentPage,
        'totalPages' => $this->totalPages,
        'pagerLinkTpl' => $this->pagerLinkTpl
    ));
?>