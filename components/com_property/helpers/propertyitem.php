<?php
    require_once(JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."helpers".DS."propertyimage.php");
    require_once(JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."helpers".DS."pfunc.php");
?>
<div class="listing" >
 <?php
  $pic = $item->picture ;
  if($pic){
     $image =  PropertyImage::getImagePropertyListThumb($pic);
     $fimage =  PropertyImage::getImageProperty($pic);
  }
  else{
     $image = "blank.jpg" ;
     $fimage = $image;
  }

    $full_path = JURI::root()."images/propertyimage/thumb/{$image}" ;
    $ffull_path = JURI::root()."images/propertyimage/thumb/{$fimage}" ;


    $str = $item->category_type;
    $str .= JText::_(" For ");
    $str .= PFunc::getListIn($item->list);

 ?>
    <div style="margin:0 auto;"> 
      <a href="<?php echo "{$ffull_path}"; ?>" rel="quickbox" >
          <img src='<?php echo $full_path; ?>' alt='<?php echo htmlentities($str,ENT_QUOTES).":  {$item->price}"; ?>' width='220' height='100' align='center' />
      </a>
    </div>
    <br />
    <h4 style="text-decoration: underline;">
        <?php echo $str; ?>
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