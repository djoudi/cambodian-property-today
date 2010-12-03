<?php
    require_once(JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."helpers".DS."propertyimage.php");
    require_once(JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."helpers".DS."pfunc.php");
?>
<div class="listing" >
 <?php
  $image = $item->picture ;
  if($image)
     $image =  PropertyImage::getImagePropertyListThumb($image);

  else
     $image = "blank.jpg" ;

  $full_path = JURI::root()."images/propertyimage/thumb/{$image}" ;

 ?>
    <div style="margin:0 auto;"> <img src='<?php echo $full_path; ?>' alt='' width='220' height='100' align='center' /> </div>
    <br />
    <h4 style="text-decoration: underline;">
        <?php
                echo $item->category_type;
                echo JText::_(" For ");
                echo PFunc::getListIn($item->list);
        ?>
    </h4>

    <ul>

        <li style="font-weight: bold;">
            <label class="nitem" ><?php echo JText::_("Ref number:") ?> </label>
            <div class="vitem" >  <?php echo "{$item->ref}"; ?> </div>
        </li>
        
        <li >
            <label class="nitem" ><?php echo JText::_("Price:") ?> </label>
            <div class="vitem" >  <?php echo "{$item->price}"; ?> </div>
        </li>

        <li>
            <label class="nitem" ><?php echo JText::_("Land Size") ?> </label>
            <div class="vitem" >  <?php echo "{$item->size_lot}"; ?> </div>
        </li>

        <li>
            <label class="nitem" ><?php echo JText::_("Building Size") ?> </label>
            <div class="vitem" >  <?php echo "{$item->size_house}"; ?> </div>
        </li>

        <li>
            <label class="nitem" ><?php echo JText::_("Bedroom") ?> </label>
            <div class="vitem" >  <?php echo "{$item->feature_bedroom}"; ?> </div>
        </li>

        <li>
            <label class="nitem" ><?php echo JText::_("Bathroom") ?> </label>
            <div class="vitem" >  <?php echo "{$item->feature_bathroom}"; ?> </div>
        </li>

        <li>
            <label class="nitem" ><?php echo JText::_("Aircon") ?> </label>
            <div class="vitem" >  <?php echo "{$item->equipment_aircon}"; ?> </div>
        </li>


        <li>
            <label class="nitem" ><?php echo JText::_("Parking") ?> </label>
            <div class="vitem" >  <?php echo "{$item->feature_parking}"; ?> </div>
        </li>

        <li>
            <label class="nitem" ><?php echo JText::_("Swimming pool") ?> </label>
            <div class="vitem" >  <?php echo "{$item->feature_pool}"; ?> </div>
        </li>

        <li class="lhighlight" style="border-bottom:none;" >
            <?php echo JText::_("Location") ?>
             (<?php echo "{$item->district_name}-{$item->province_name}"; ?>)
        </li>

        
    </ul>
</div>