<?php
defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldBannerList extends JFormFieldList
{
    protected $type = 'BannerList';
    public function getOptions()
    {
        $options = array();
        $db = JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->from('`#__categories` AS c ');
        $query->select('c.id As value, c.title As text');
        $query->where(" c.extension = 'com_property' ");
        $query->where(" c.published > -2");
        $query->order("c.title ASC");
        $db->setQuery($query);
        $options = $db->loadObjectList();

        if ($db->getErrorNum())
           JError::raiseWarning(500, $db->getErrorMsg());

        $emptyOption = JHtml::_('select.option', '0', JText::_('Select type'));
        array_unshift($options, $emptyOption);
        return $options;
    }
}
