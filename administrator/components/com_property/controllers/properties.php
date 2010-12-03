<?php
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class PropertyControllerProperties extends JControllerAdmin
{
	
    public function __construct($config = array())
    {
            parent::__construct($config);
            //$this->registerTask('unfeatured',	'featured');
    }

    public function &getModel($name = 'Property', $prefix = 'PropertyModel')
    {
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));

            return $model;
    }
}