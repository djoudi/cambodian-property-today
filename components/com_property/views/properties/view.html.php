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
        $this->list_properties();
       
    }
    public function list_properties(){
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');
        $this->state		= $this->get('State');
        parent::display($tpl);
    }
}
