<?php
defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');
// Execute the task.

$controller	= JController::getInstance('Property');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
