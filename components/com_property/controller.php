<?php
// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class PropertyController extends JController
{

    protected $default_view = 'Properties';
    public function display($cachable = false, $urlparams = false)
    {
            $view = JRequest::getWord('view');
            if(!$view){
                JRequest::setVar("view","properties");
                $view = JRequest::getWord('view');
            }
            parent::display();
            return $this;
    }
}
