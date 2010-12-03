<?php
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class PropertyControllerProvinces extends JControllerAdmin
{
	protected $text_prefix = 'Provinces';
	public function __construct($config = array())
	{
		parent::__construct($config);
		//$this->registerTask('unpublish',	'publish');
	}

	public function &getModel($name = 'Province', $prefix = 'PropertyModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

}