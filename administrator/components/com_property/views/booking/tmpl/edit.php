<?php
    defined('_JEXEC') or die;
    JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers'.DS.'html');
    JHtml::_('behavior.tooltip');
    JHtml::_('behavior.formvalidation');
    $canDo	= PropertyMenuHelper::getActions();
?>
<script type="text/javascript">
    Joomla.submitbutton = function(task)
    {
        if (task == 'booking.cancel' || document.formvalidator.isValid(document.id('booking-form')))
            Joomla.submitform(task, document.getElementById('booking-form'));
        
    }
</script>

<form action="<?php echo JRoute::_("index.php?option=com_property&layout=edit&id={$this->item->id}"); ?>" method="post" name="adminForm" id="booking-form" class="form-validate">

    <div>
        <fieldset class="adminform">
            <legend><?php echo empty($this->item->id) ? JText::_('Add Booking') : JText::sprintf('Edit Booking', $this->item->id); ?></legend>

            <table class="adminform" >
                <tr>
                    <td width="100" > <?php echo $this->form->getLabel('name'); ?> </td>
                    <td> <?php echo $this->form->getInput('name'); ?> </td>
                </tr>                

                <tr>
                    <td> <?php echo $this->form->getLabel('nationality'); ?></td>
                    <td> <?php echo $this->form->getInput('nationality'); ?></td>
                </tr>                   

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('passport_id'); ?></td>
                    <td> <?php echo $this->form->getInput('passport_id'); ?></td>
                </tr>                

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('phone'); ?></td>
                    <td> <?php echo $this->form->getInput('phone'); ?></td>
                </tr>

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('email'); ?></td>
                    <td> <?php echo $this->form->getInput('email'); ?></td>
                </tr>

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('occupation'); ?></td>
                    <td> <?php echo $this->form->getInput('occupation'); ?></td>
                </tr>
                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('position'); ?></td>
                    <td> <?php echo $this->form->getInput('position'); ?></td>
                </tr>

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('current_address'); ?></td>
                    <td> <?php echo $this->form->getInput('current_address'); ?></td>
                </tr>
                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('work_address'); ?></td>
                    <td> <?php echo $this->form->getInput('work_address'); ?></td>
                </tr>
                
                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('other'); ?></td>
                    <td> <?php echo $this->form->getInput('other'); ?></td>
                </tr>

                <tr>
                    <td> <?php echo $this->form->getLabel('id'); ?> </td>
                    <td> <?php echo $this->form->getInput('id'); ?></td>
                </tr>
                
            </table>            
            <div class="cls"> </div>
            
        </fieldset>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>