<?php
// no direct access
defined('_JEXEC') or die;
?>
<form action="<?php echo JRoute::_("index.php"); ?>" method="post" >
    <div>
        <?php foreach($this->items as $item) :?>
            <?php require JPATH_COMPONENT.DS."helpers".DS."propertyitem.php"; ?>
        <?php endforeach; ?>
        <br />
        <?php if($pageLnk=$this->pagination->getPagesLinks()):?>

        <div class="clr paging round" style="clear:both;" >
            <?php echo $pageLnk ; ?>
            <div class="clr" > </div>
        </div>
        <?php endif;?>
    </div>
</form>
<script type="text/javascript">
    new QuickBox(); 
</script>



