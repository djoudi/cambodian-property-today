<?php
// No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class PropertyViewProperties extends JView
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
        JToolBarHelper::title(JText::_('Properties Management'), 'banners.png');

        if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('property.add','JTOOLBAR_NEW');
        }
        if ($canDo->get('core.edit')) {
                JToolBarHelper::editList('property.edit','JTOOLBAR_EDIT');
        }

        if ($canDo->get('core.edit.state')) {
                if ($this->state->get('filter.state') != 2){
                        JToolBarHelper::divider();
                        JToolBarHelper::custom('properties.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
                        JToolBarHelper::custom('properties.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
                }
                if ($this->state->get('filter.state') != -1 ) {
                        JToolBarHelper::divider();
                        if ($this->state->get('filter.state') != 2) {
                                JToolBarHelper::archiveList('properties.archive','JTOOLBAR_ARCHIVE');
                        }
                        else if ($this->state->get('filter.state') == 2) {
                                JToolBarHelper::unarchiveList('properties.publish', 'JTOOLBAR_UNARCHIVE');
                        }
                }
        }
        if ($canDo->get('core.edit.state')) {
                JToolBarHelper::custom('properties.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);		}
        if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'properties.delete','JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
        } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('properties.trash','JTOOLBAR_TRASH');
                JToolBarHelper::divider();
        }
        if ($canDo->get('core.admin')) {
                JToolBarHelper::preferences('com_property');
                JToolBarHelper::divider();
        }
        JToolBarHelper::help('Properties Help');
    }
}
