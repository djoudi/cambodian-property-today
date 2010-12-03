<?php
defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldAgentList extends JFormFieldList
{
    protected $type = 'AgentList';
    public function getOptions()
    {
        $options = array();
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);

        $query->select('id As value, name As text');
        $query->from('#__ch_agent AS a');
        $query->order('a.name');

        $db->setQuery($query);
        $options = $db->loadObjectList();
        if ($db->getErrorNum())
            JError::raiseWarning(500, $db->getErrorMsg());

        $emptyOption = JHtml::_('select.option', '0', JText::_('Select location'));
        array_unshift($options, $emptyOption);
        return $options;
    }
}
