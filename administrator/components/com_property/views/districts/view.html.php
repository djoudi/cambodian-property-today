<?php
// No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class PropertyViewDistricts extends JView
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

    public function getbyprovince($tpl = null){

        ch_debug($_REQUEST);
        
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        require_once JPATH_COMPONENT.'/helpers/property.php';
        $filter_id = $this->state;
        $canDo	= PropertyMenuHelper::getActions($filter_id);
        JToolBarHelper::title(JText::_('Provinces Management'), 'banners.png');

        if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('district.add','JTOOLBAR_NEW');
        }
        if ($canDo->get('core.edit')) {
                JToolBarHelper::editList('district.edit','JTOOLBAR_EDIT');
        }

        if ($canDo->get('core.edit.state')) {
            if ($this->state->get('filter.state') != 2){
                    JToolBarHelper::divider();
                    JToolBarHelper::custom('districts.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
                    JToolBarHelper::custom('districts.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            }
        }                  
         else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('districts.trash','JTOOLBAR_TRASH');
                JToolBarHelper::divider();
        }

        JToolBarHelper::deleteList('', 'districts.delete','JTOOLBAR_EMPTY_TRASH');
        JToolBarHelper::help('Properties Help');
    }
}
