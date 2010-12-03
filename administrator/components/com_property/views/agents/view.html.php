<?php
// No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class PropertyViewAgents extends JView
{
    protected $items;
    protected $pagination;
    protected $state;

    public function display($tpl = null)
    {
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');
        $this->state		= $this->get('State');
        // Check for errors.
        $errors = $this->get('Errors');
        if (count($errors)) {
                JError::raiseError(500, implode("\n", $errors));
                return false;
        }
        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        require_once JPATH_COMPONENT.'/helpers/property.php';
        $filter_id = $this->state;
        $canDo	= PropertyMenuHelper::getActions($filter_id);
        JToolBarHelper::title(JText::_('Agents Management'), 'banners.png');

        if ($canDo->get('core.create')){
           JToolBarHelper::addNew('agent.add','JTOOLBAR_NEW');
        }
        
        if ($canDo->get('core.edit')) 
           JToolBarHelper::editList('agent.edit','JTOOLBAR_EDIT');

        JToolBarHelper::deleteList('', 'agents.delete','JTOOLBAR_EMPTY_TRASH');
              
        if ($canDo->get('core.admin')){
            JToolBarHelper::preferences('com_property');
            JToolBarHelper::divider();
        }
        
        JToolBarHelper::help('Properties Help');
    }
}
