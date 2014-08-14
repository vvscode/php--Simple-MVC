<?php
/**
 * @var $this View
 */

?>

<?php
$this->renderPartial('guestbook/parts/form');
?>

    <div class="messages">
        <?php foreach ($this->messages as $msg) {
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

<script>
    $(function(){
       $(document).on('submit', 'form', function(ev){
           var $form = $(this);

           $.ajax({
               url: window.location.href,
               data: $form.serializeArray(),
               type: 'POST',
               success: function(data){
                   if(data.indexOf('alert-warning')>=0){
                       $(data).prependTo($form.parent());
                       $form.remove();
                   } else {
                       window.location.reload();
                   }
               }
           })

           ev.preventDefault();
       });
    });
</script>