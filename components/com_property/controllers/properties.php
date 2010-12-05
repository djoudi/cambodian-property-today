<?php
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class PropertyControllerProperties extends JController
{
	
    public function __construct($config = array())
    {
       JRequest::setVar("view","properties");
       parent::__construct($config);
    }
    public function &getModel($name = 'Property', $prefix = 'PropertyModel')
    {
       $model = parent::getModel($name, $prefix, array('ignore_request' => true));
       return $model;
    }
    public function search(){
        JRequest::setVar("layout","search");
        ch_debug(JRequest::get());
        parent::display();
    }
    public function sale(){
        JRequest::setVar("layout","sale");
        parent::display();
    }

    public function rent(){
        JRequest::setVar("layout","rent");
        parent::display();
    }
    
}