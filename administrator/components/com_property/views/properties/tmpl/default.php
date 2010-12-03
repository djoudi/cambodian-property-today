<?php
// no direct access
defined('_JEXEC') or die;
require_once(JPATH_COMPONENT.DS."helpers".DS."pfunc.php");
require_once(JPATH_COMPONENT.DS."helpers".DS."propertyimage.php");

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers'.DS.'html');
JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_property.property');
$saveOrder	= $listOrder=='ordering';

//ch_debug($this->items);

?>
<form action="<?php echo JRoute::_('index.php?option=com_property&view=properties'); ?>" method="post" name="adminForm" id="adminForm">
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
                <th width="1%">
                        <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
                </th>
                
                <th class="title left" >
                        <?php echo JHtml::_('grid.sort',  'Ref', 'ref', $listDirn, $listOrder); ?>
                </th>
                <th class="title left" >
                        <?php echo JHtml::_('grid.sort',  'Owner', 'owner_name', $listDirn, $listOrder); ?>
                </th>

                <th width="5%">
                        <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'published', $listDirn, $listOrder); ?>
                </th>

                <th width="5%" class="nowrap">
                        <?php echo JHtml::_('grid.sort', 'Type', 'list', $listDirn, $listOrder); ?>
                </th>

                <th width="5%" class="nowrap">
                        <?php echo JHtml::_('grid.sort', 'Category', 'id_type', $listDirn, $listOrder); ?>
                </th>

                <th width="10%" class="nowrap">
                        <?php echo JHtml::_('grid.sort', 'Price', 'price', $listDirn, $listOrder); ?>
                </th>

                <th width="10%">
                        <?php echo JHtml::_('grid.sort', 'Location', 'province_name', $listDirn, $listOrder); ?>
                </th>
                
                <th width="1%" class="nowrap">
                        <?php echo JHtml::_('grid.sort', 'ID', 'id', $listDirn, $listOrder); ?>
                </th>
                <th width="55" > <?php echo  JText::_("Image");  ?> </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                    <td colspan="12">
                            <?php echo $this->pagination->getListFooter(); ?>
                    </td>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($this->items as $i => $item) :
                $ordering   = ($listOrder == 'ordering');
                $canCreate  = $user->authorise('core.create','com_property.property.'.$item->id);
                $canEdit    = $user->authorise('core.edit',	'com_property.property.'.$item->id);
                $canCheckin = $user->authorise('core.manage','com_checkin') || $item->checked_out==$user->get('id') || $item->checked_out==0;
                $canChange  = $user->authorise('core.edit.state','com_property.property.'.$item->id) && $canCheckin;
                $urlEdit    = "index.php?option=com_property&task=property.edit&id={$item->id}";

                ?>
                <tr class="row<?php echo $i % 2; ?>">
                    <td class="center">
                        <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                    </td>
                    <td>
                        <a href="<?php echo $urlEdit; ?>" >  <?php echo $item->ref ?> </a>
                    </td>
                    <td>
                        <a href="<?php echo $urlEdit; ?>" >  <?php echo $item->owner_name; ?> </a>
                    </td>
                    <td class="center">
                            <?php echo JHtml::_('jgrid.published', $item->published, $i, 'properties.', $canChange);?>
                    </td>
                    <td class="center">
                            <?php echo PFunc::getListIn($item->list); ?>
                    </td>
                    <td class="center">
                            <?php echo $item->category_name;?>
                    </td>
                    <td class="center">
                            <?php echo $item->price;?>
                    </td>
                    <td class="center">
                            <?php echo "{$item->province_name}<b>/</b>{$item->district_name}"; ?>
                    </td>

                    <td class="center">
                            <?php echo $item->id; ?>
                    </td>

                    <td class="center">
                     <?php
                      $image = $item->picture ;
                      if($image){
                         $image =  PropertyImage::getImagePropertyThumb($image);
                      }
                      else{
                         $image = "blank.jpg" ;
                      }
                      $full_path = JURI::root()."images/propertyimage/thumb/{$image}" ;
                      echo "<img src='{$full_path}' alt='' width='50' height='30' />";
                     ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
            <input type="hidden" name="task" value="" />
            <input type="hidden" name="boxchecked" value="0" />
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
            <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
