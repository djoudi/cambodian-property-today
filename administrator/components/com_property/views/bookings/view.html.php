<?php
// No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class PropertyViewBookings extends JView
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
        JToolBarHelper::title(JText::_('Bookings Management'), 'banners.png');

        if ($canDo->get('core.create')){
           JToolBarHelper::addNew('booking.add','JTOOLBAR_NEW');
        }
        
        if ($canDo->get('core.edit')) 
           JToolBarHelper::editList('booking.edit','JTOOLBAR_EDIT');

        JToolBarHelper::deleteList('', 'booking.delete','JTOOLBAR_EMPTY_TRASH');
              
        if ($canDo->get('core.admin')){
            JToolBarHelper::preferences('com_property');
            JToolBarHelper::divider();
        }
        
        JToolBarHelper::help('Properties Help');
    }
}
