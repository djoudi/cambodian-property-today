<?php
defined('_JEXEC') or die;
?>
<select id="jform_id_district" name="jform[id_district]" class="inputbox" >
    <?php foreach($options as $option):?>
        <option value="<?php echo $option->value ?>"> <?php echo $option->text; ?>  </option>
    <?php endforeach ; ?>
</select>



