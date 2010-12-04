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
        if (task == 'agent.cancel' || document.formvalidator.isValid(document.id('agent-form')))
            Joomla.submitform(task, document.getElementById('agent-form'));
        
    }
</script>

<form action="<?php echo JRoute::_("index.php?option=com_property&layout=edit&id={$this->item->id}"); ?>" method="post" name="adminForm" id="agent-form" class="form-validate">

    <div>
        <fieldset class="adminform">
            <legend><?php echo empty($this->item->id) ? JText::_('Add Agent') : JText::sprintf('Edit Agent', $this->item->id); ?></legend>

            <table class="adminform" >
                <tr>
                    <td width="100" > <?php echo $this->form->getLabel('name'); ?> </td>
                    <td> <?php echo $this->form->getInput('name'); ?> </td>
                </tr>                

                <tr>
                    <td> <?php echo $this->form->getLabel('tel'); ?></td>
                    <td> <?php echo $this->form->getInput('tel'); ?></td>
                </tr>                   

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('email'); ?></td>
                    <td> <?php echo $this->form->getInput('email'); ?></td>
                </tr>                

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('position'); ?></td>
                    <td> <?php echo $this->form->getInput('position'); ?></td>
                </tr>

                <tr>
                    <td valign="top" > <?php echo $this->form->getLabel('description'); ?></td>
                    <td> <?php echo $this->form->getInput('description'); ?></td>
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