<?php
/**
 * @version		$Id: edit.php 19073 2010-10-09 15:44:28Z chdemko $
 * @package		Joomla.Administrator
 * @subpackage	com_banners
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers'.DS.'html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$canDo	= PropertyMenuHelper::getActions();
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'owner.cancel' || document.formvalidator.isValid(document.id('owner-form'))) {
			Joomla.submitform(task, document.getElementById('owner-form'));
		}
	}
</script>

<form action="<?php echo JRoute::_("index.php?option=com_property&layout=edit&id={$this->item->id}"); ?>" method="post" name="adminForm" id="owner-form" class="form-validate">

<div class="width-60 fltlft">
	<fieldset class="adminform">
		<legend><?php echo empty($this->item->id) ? JText::_('Add Owner') : JText::sprintf('Edit Owner', $this->item->id); ?></legend>
		<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('name'); ?>
				<?php echo $this->form->getInput('name'); ?></li>

				<li><?php echo $this->form->getLabel('occupation'); ?>
				<?php echo $this->form->getInput('occupation'); ?></li>

                                <li><?php echo $this->form->getLabel('address'); ?>
                                <?php echo $this->form->getInput('address'); ?></li>

                                <li><?php echo $this->form->getLabel('street'); ?>
                                <?php echo $this->form->getInput('street'); ?></li>

                                <li><?php echo $this->form->getLabel('commune'); ?>
                                <?php echo $this->form->getInput('commune'); ?></li>

                                <li><?php echo $this->form->getLabel('district'); ?>
                                <?php echo $this->form->getInput('district'); ?></li>

                                <li><?php echo $this->form->getLabel('city'); ?>
                                <?php echo $this->form->getInput('city'); ?></li>

                                <li><?php echo $this->form->getLabel('tel1'); ?>
                                <?php echo $this->form->getInput('tel1'); ?></li>

                                <li><?php echo $this->form->getLabel('tel2'); ?>
                                <?php echo $this->form->getInput('tel2'); ?></li>

                                <li><?php echo $this->form->getLabel('fax'); ?>
                                <?php echo $this->form->getInput('fax'); ?></li>

                                <li><?php echo $this->form->getLabel('email'); ?>
                                <?php echo $this->form->getInput('email'); ?></li>
           
				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
		</ul>

	</fieldset>
</div>

<div class="width-40 fltrt">
	<?php echo JHtml::_('sliders.start','Owner-sliders-'.$this->item->id, array('useCookie'=>1)); ?>

	<?php echo JHtml::_('sliders.panel',JText::_('Option'), 'publishing-details'); ?>
		<fieldset class="panelform">
		<ul class="adminformlist">
			<?php if ($canDo->get('core.edit.state')) { ?>
                                    <li><?php echo $this->form->getLabel('state'); ?>
                                    <?php echo $this->form->getInput('state'); ?></li>
			<?php }?>
		</ul>
		</fieldset>

	<?php echo JHtml::_('sliders.end'); ?>
</div>

<div class="clr"></div>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>