<?php
$this->renderPartial('guestbook/parts/form');
?>

<div class="messages">
    <?php foreach($this->messages as $msg){
        $this->renderPartial('guestbook/parts/message', array('message' => $msg));
     } ?>
</div>