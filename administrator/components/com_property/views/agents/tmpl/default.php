<?php
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers'.DS.'html');
JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDir	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_property.property');
$saveOrder	= $listOrder=='ordering';
?>
<form action="<?php echo JRoute::_('index.php?option=com_property&view=agents'); ?>" method="post" name="adminForm" id="adminForm">
    <fieldset id="filter-bar">
        <div class="filter-search fltlft">
            <label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
            <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->state->get('filter.search'); ?>" title="<?php echo JText::_('COM_BANNERS_SEARCH_IN_TITLE'); ?>" />
            <button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
            <button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
        </div>
        <div class="filter-select fltrt">

            <select name="filter_state" class="inputbox" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                    <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true);?>
            </select>

            <select name="filter_category_id" class="inputbox" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('Type');?></option>
                    <?php echo JHtml::_('select.options', JHtml::_('category.options', 'com_property'), 'value', 'text', $this->state->get('filter.category_id'));?>
            </select>

        </div>
    </fieldset>
    <div class="clr"> </div>
    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%"><input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" /></th>
                <th class="title"> <?php echo JHtml::_('grid.sort',  'Name', 'name', $listDirn, $listOrder); ?>   </th>
                <th>  <?php echo JHtml::_('grid.sort', 'Tel', 'tel', $listDirn, $listOrder); ?> </th>
                <th>  <?php echo JHtml::_('grid.sort', 'Email', 'email', $listDirn, $listOrder); ?> </th>
                <th>  <?php echo JHtml::_('grid.sort', 'Position', 'position', $listDirn, $listOrder); ?> </th>           
            </tr>
        </thead>
        
        <tbody>
        <?php foreach ($this->items as $i => $item) :
            $ordering	= ($listOrder == 'ordering');
            $urlEdit        = "index.php?option=com_property&task=agent.edit&id={$item->id}" ;
            $canCreate	= $user->authorise('core.create',		'com_property.agent.'.$item->id);
            $canEdit	= $user->authorise('core.edit',			'com_property.agent.'.$item->id);
            $canCheckin	= $user->authorise('core.manage',		'com_checkin') || $item->checked_out==$user->get('id') || $item->checked_out==0;
            $canChange	= $user->authorise('core.edit.state',	'com_property.agent.'.$item->id) && $canCheckin;
        ?>
            
        <tr class="row<?php echo $i % 2; ?>">
            <td class="left" width="5%" > <?php echo JHtml::_('grid.id', $i, $item->id); ?> </td>
            <td class="left" width="40%"> <a href="<?php echo $urlEdit ?>" > <?php echo $item->name;?> </a></td>
            <td class="left" width="15%" > <?php echo $item->tel ?> </td>
            <td class="left" width="25%" > <?php echo $item->email;?> </td>
            <td class="left" width="15%" > <?php echo $item->position;?> </td>
        </tr>
        <?php endforeach; ?>
        </tbody>

        <tfoot> <tr> <td colspan="12"> <?php echo $this->pagination->getListFooter(); ?>  </td>  </tr> </tfoot>
    </table>
    <div>
            <input type="hidden" name="task" value="" />
            <input type="hidden" name="boxchecked" value="0" />
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDir; ?>" />
            <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
