<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

$fields_path = JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."models".DS."fields".DS;

require_once ("{$fields_path}categorylist.php");
require_once ("{$fields_path}typelist.php");
require_once ("{$fields_path}districtlist.php");
require_once ("{$fields_path}provincelist.php");
require_once ("{$fields_path}pricelist.php");


$lists["list"] = JFormFieldTypeList::getOptions();
$lists["id_type"] = JFormFieldCategoryList::getOptions();
$lists["id_province"] = JFormFieldProvinceList::getOptions();
$lists["id_district"] = JFormFieldDistrictList::getOptions();
$lists["price"] = JFormFieldPriceList::getOptions();

$forms = JRequest::getVar("jform",array());
require(JModuleHelper::getLayoutPath('mod_property_search','default'));

?>
<form method="post" action="<?php echo JRoute::_("index.php?option=com_property&layout=search&task=properties.search"); ?>">
  <ul class="search-item">
    <li>
        <label class="nitemsearch"> <?php echo JText::_("Type"); ?> </label>
        <?php echo JHTML::_('select.genericlist', $lists["list"], "jform[list]", ' class="inputbox" ', 'value', 'text',$forms["list"] ); ?>
    </li>

    <li>
        <label class="nitemsearch"> <?php echo JText::_("Category"); ?> </label>
        <?php echo JHTML::_('select.genericlist', $lists["id_type"], "jform[id_type]", ' class="inputbox" ', 'value', 'text',$forms["id_type"] ); ?>
    </li>

    <li>
        <label class="nitemsearch"> <?php echo JText::_("Province"); ?> </label>
        <?php echo JHTML::_('select.genericlist', $lists["id_province"], "jform[id_province]", ' class="inputbox" ', 'value', 'text',$forms["id_province"] ); ?>
    </li>

    <li id ="">
        <label class="nitemsearch"> <?php echo JText::_("District"); ?> </label>
        <span id="container_id_district">
        <?php echo JHTML::_('select.genericlist', $lists["id_district"], "jform[id_district]", ' class="inputbox" ', 'value', 'text',$forms["id_district"] ); ?>
        </span>
    </li>

    <li>
        <label class="nitemsearch"> <?php echo JText::_("Price"); ?> </label>
        <?php echo JHTML::_('select.genericlist', $lists["price"], "jform[price]", ' class="inputbox" ', 'value', 'text',$forms["price"] ); ?>
    </li>

    <li>
        <p style="text-align: right;margin-right: 5px;">
            <input type="submit" class="button" name="search" id="search" value=" Search " />
        </p>
    </li>
 </ul>
</form>
<script type="text/javascript" >
     window.addEvent('domready', function() {
        var prov = document.getElementById("jformid_province");

        prov.onchange = function(){
            var prov = this.options[this.selectedIndex].value;
            <?php
             $url = JRoute::_("index.php?option=com_property&task=districts.getbyprovince");
            ?>
            var url = "<?php echo $url; ?>"
            var request = new Request({
                method : 'get',
                url : url,
                data: {id_province:prov},
                onRequest: function(){

                },
                onComplete: function(response){
                   var div = document.getElementById("container_id_district");
                   div.innerHTML= response;
                }
            });
            request.send();
        }

     });

 </script>