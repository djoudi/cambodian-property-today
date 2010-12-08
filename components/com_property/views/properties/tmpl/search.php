<?php
// No direct access.
defined('_JEXEC') or die;
//require_once (dirname(__FILE__).DS."default.php");
?>

<?php
 $jform = JRequest::getVar("jform",array());
?>
<form action="<?php echo JRoute::_("index.php"); ?>" id="property_list" method="post" method="post" >
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

    <input type="hidden" value="<?php echo $jform["list"] ?>" name="jform[list]" />
    <input type="hidden" value="<?php echo $jform["id_type"] ?>" name="jform[id_type]" />
    <input type="hidden" value="<?php echo $jform["id_province"] ?>" name="jform[id_province]" />
    <input type="hidden" value="<?php echo $jform["id_district"] ?>" name="jform[id_district]" />
    <input type="hidden" value="<?php echo $jform["price"] ?>" name="jform[price]" />
</form>







<script type="text/javascript" >
     window.addEvent('domready', function() {
         var anchors = document.getElementsByTagName("a");
         var anchors_pages = [];
         for(var i=0;i<anchors.length;i++){
             if(anchors[i].className == "pagenav"){
                 anchors[i].onclick = function(){
                    var form = document.getElementById("property_list");
                    form.action = this.href ;
                    form.submit();
                    return false;
                 }
             }
         }

     });

    new QuickBox();
</script>