<?php
defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldDistrictList extends JFormFieldList
{
    protected $type = 'DistrictList';
    public function getOptions($province=0)
    {
        $options = array();
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);

        $query->select('id As value, name As text');
        $query->from('#__ch_district AS a');
        if($province)
            $query->where("a.id_province = '{$province}' ");
        $query->order('a.name');
        $query->where("a.published != 0 ");

        $db->setQuery($query);
        $options = $db->loadObjectList();
        if ($db->getErrorNum())
           JError::raiseWarning(500, $db->getErrorMsg());

        $emptyOption = JHtml::_('select.option', '0', JText::_('Select location'));
        array_unshift($options, $emptyOption);
        return $options;
    }
}
