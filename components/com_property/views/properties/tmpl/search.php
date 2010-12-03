<?php
// No direct access.
defined('_JEXEC') or die;
require_once (dirname(__FILE__).DS."default.php");
?>

<?php
 $jform = JRequest::get("jform",array());


?>
<form id="property_list" method="post" >
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



</script>