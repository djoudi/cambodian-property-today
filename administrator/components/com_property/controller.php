<?php
// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class PropertyController extends JController
{

    protected $default_view = 'Properties';
    public function display($cachable = false, $urlparams = false)
    {
            require_once JPATH_COMPONENT.'/helpers/property.php';
            $view = JRequest::getWord('view');
            if(!$view){
                JRequest::setVar("view","properties");
                $view = JRequest::getWord('view');
            }
            PropertyMenuHelper::addSubmenu($view); //we dont pretend to create it with xml install file
            parent::display();
            return $this;
    }
}
