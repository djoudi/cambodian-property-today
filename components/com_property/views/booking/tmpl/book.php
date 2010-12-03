<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h2>
    <?php echo JText::_("Please fill in the following booking form"); ?>
</h2>
<form id="bookingForm" action="<?php echo JRoute::_("index.php?option=com_property&task=booking.submit") ?>" method="post" >
    <ul class="uform" >
        <li>
            <label for="name"  ><?php echo JText::_("Name") ?><span class="require">*</span> </label>
            <div  > <input type="text" name="name" id="name" value="" class="inputbox" /> </div>
        </li>
        <li>
            <label  for="nationality"  ><?php echo JText::_("Nationality") ?> </label>
            <div > <input type="text" name="nationality" id="nationality" value=""  class="inputbox"  /> </div>
        </li>
        <li>
            <label  for="passport_id" ><?php echo JText::_("Passport") ?> </label>
            <div > <input type="text" name="passport_id" id="passport_id" value="" class="inputbox"   /> </div>
        </li>
        <li>
            <label  for="phone" ><?php echo JText::_("Phone") ?> </label>
            <div > <input type="text" name="phone" id="phone" value="" class="inputbox"   /> </div>
        </li>
        <li>
            <label  for="email" ><?php echo JText::_("Email") ?><span class="require">*</span> </label>
            <div > <input type="text" name="email" id="email" value="" class="inputbox"   /> </div>
        </li>
        <li>
            <label  for="occupation" ><?php echo JText::_("Occupation") ?> </label>
            <div > <input type="text" name="occupation" id="occupation" value=""  class="inputbox"  /> </div>
        </li>
        <li>
            <label  for="position" ><?php echo JText::_("Position") ?> </label>
            <div > <input type="text" name="position" id="position" value="" class="inputbox"   /> </div>
        </li>
        <li>
            <label for="current_address"  ><?php echo JText::_("Current Address") ?> </label>
            <div > <textarea class="tarea inputbox" name="current_address" id="current_address"  ></textarea></div>
        </li>
        <li>
            <label  for="work_address" ><?php echo JText::_("Office Address") ?> </label>
            <div ><textarea class="tarea inputbox" name="work_address" id="work_address"  ></textarea></div>
        </li>
        <li>
            <label  for="other" ><?php echo JText::_("Other Info") ?> </label>
            <div ><textarea class="tarea inputbox" name="other" id="other" ></textarea></div>
        </li>
        <li>
            <input type="checkbox" name="emailcopy" id="emailcopy"  class="inputbox"  />
            <label  for="emailcopy" ><?php echo JText::_("Email copy to my mail") ?> </label>
        </li>

        <li>
            <br />
            <div > <input type="submit" name="submit" id="submit" class="button" value="Book now"  /> </div>
        </li>
    </ul>
    <?php echo JHtml::_('form.token'); ?>
</form>
<script type="text/javascript">
  window.addEvent('domready', function() {
      var form = document.getElementById("bookingForm");
      form.onsubmit = function(){
         var success = true;
         var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
         var email = document.getElementById("email");
         var name = document.getElementById("name");
         var address = email.value;
         if(reg.test(address) == false) {
             document.getElementById("email").style.border ="1px solid red";
             success = false ;
         }
         if(name.value == ""){
            name.style.border ="1px solid red";
            success = false;
         }
         return success;
      }

  });
</script>
