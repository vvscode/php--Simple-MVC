<?php
/**
 * @var $message GbMessageModel
 */

?>
<div class="panel panel-default">
    <div class="panel-heading"><strong><?= htmlspecialchars($message->userName) ?></strong> <?= $message->date ?></div>
    <div class="panel-body">
        <?= htmlspecialchars($message->messageText) ?>
    </div>
</div>