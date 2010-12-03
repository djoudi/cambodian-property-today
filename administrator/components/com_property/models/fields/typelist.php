<?php
defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
require_once(JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."helpers".DS."pfunc.php");
class JFormFieldTypeList extends JFormFieldList
{
    protected $type = 'TypeList';
    public function getOptions()
    {
        $options = array();

        $temp = new stdClass();
        $temp->value = 0;
        $temp->text = JText::_('Select Type');
        $options[] = $temp;

        $lists = PFunc::getList();
        $i = 1;
        foreach($lists as $list){
            $temp = new stdClass();
            $temp->value = $i++;
            $temp->text = $list;
            $options[]= $temp;
        }        
        return $options;
    }
}
