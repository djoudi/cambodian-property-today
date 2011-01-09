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
          <img src='<?php echo $full_path; ?>' alt='<?php echo htmlentities($str,ENT_QUOTES).":  {$item->price}"; ?>' width='170' height='130' align='center' />
      </a>
    </div>
    <br />
    <h3 style="padding:0px;margin:0px;font-size: 14px;">
        <?php echo $str; ?>
    </h3>

    <ul class="tproperties" style="padding:5px;margin:0px;">

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
            <label class="nitem" style="width:7em;" ><?php echo JText::_("Swimming pool") ?> </label>
            <div class="vitem" style="width: 50px;" >
            <?php
                $pool = array(JText::_("No"),JText::_("Yes"));
                echo "{$pool[intval($item->feature_pool)]}";
            ?>
            </div>
        </li>
        <li >
                <label class="nitem" style="width:30px;" ><?php echo JText::_("Add") ?> </label>
                <div class="vitem" style="width:130px;" ><?php echo "{$item->district_name}"; ?></div>
        </li>

        <li style="color:#660308;font-weight: bold;" >
            <label class="nitem"  ><?php echo JText::_("Financials") ?> </label>
            <div class="vitem" > $ 

                <?php

                    if($item->price){
                        echo intval($item->price) ;
                        if($item->list==1)
                            echo JText::_("/mth") ;
                    }
                    elseif($item->price_in_sq)
                        echo "{$item->price_in_sq}".JText::_("/m<sup>2</sup>") ;
                    
                ?>
            </div>
        </li>

        <li style="font-weight: bold;height: 1.2em;overflow: hidden;">
            <label class="nitem" ><?php echo JText::_("Ref") ?> </label>
            <div class="vitem" >  <?php echo "{$item->ref}"; ?> </div>
        </li>
    </ul>
</div>