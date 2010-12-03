<?php
// No direct access.
defined('_JEXEC') or die;
require_once (dirname(__FILE__).DS."default.php");
?>

<form id="property_list" method="post" action="" >
    <input type="hidden" value="properties.rent" name="task" />
    <input type="hidden" value="com_property" name="option" />
</form>
<script type="text/javascript" >
     window.addEvent('domready', function() {
         var anchors = document.getElementsByTagName("a");

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