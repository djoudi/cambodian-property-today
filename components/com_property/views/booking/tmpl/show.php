<?php
    $item = $this->item;
?>
<div class="listing" style="width: 98%;padding:5px;">
 <h2> 
    <?php echo JText::_("Your booking request has been sent successfully  "); ?>
     
 </h2>
    <p style="color:gray">
        The following are your booking detail. Our agent will be in touch with you as
        soon as possible.
    </p>

 <ul>
    <li>
        <label class="bnitem" ><?php echo JText::_("Name"); ?> </label>
         <div class="bvitem">  <?php echo $item["name"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Nationality"); ?> </label>
         <div class="bvitem">  <?php echo $item["nationality"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Passport"); ?> </label>
         <div class="bvitem">  <?php echo $item["passport_id"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Phone"); ?> </label>
         <div class="bvitem">  <?php echo $item["phone"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Email"); ?> </label>
         <div class="bvitem">  <?php echo $item["email"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Occupation"); ?> </label>
         <div class="bvitem">  <?php echo $item["occupation"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Position"); ?> </label>
         <div class="bvitem">  <?php echo $item["position"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Current Address"); ?> </label>
         <div class="bvitem">  <?php echo $item["current_address"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Office Address"); ?> </label>
         <div class="bvitem">  <?php echo $item["work_address"] ;?> </div>
    </li>
    <li>
        <label class="bnitem"><?php echo JText::_("Other Info"); ?> </label>
         <div class="bvitem">  <?php echo $item["other"] ;?> </div>
    </li>
 </ul>

</div>