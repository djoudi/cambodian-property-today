<?php
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class PropertyControllerAgents extends JControllerAdmin
{
	protected $text_prefix = 'Agents';
        
	public function __construct($config = array())
	{      
            parent::__construct($config);
	}
	
	public function &getModel($name = 'Agent', $prefix = 'PropertyModel')
	{       
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));
            return $model;
	}
       
}