<?php
class PropertyMenuHelper
{
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
                        JText::_('Properties'),
			'index.php?option=com_property&view=properties',
			$vName == 'properties'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('Owners'),
			'index.php?option=com_property&view=owners',
			$vName == 'owners'
		);
                JSubMenuHelper::addEntry(
			JText::_('Agent'),
			'index.php?option=com_property&view=agents',
			$vName == 'agents'
		);
		JSubMenuHelper::addEntry(
			JText::_('Types'),
			'index.php?option=com_categories&extension=com_property',
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title(
				JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE',JText::_('com_property')),
				'banners-categories');
		}
                JSubMenuHelper::addEntry(
			JText::_('Booking'),
			'index.php?option=com_property&view=bookings',
			$vName == 'bookings'
		);
                JSubMenuHelper::addEntry(
			JText::_('Province'),
			'index.php?option=com_property&view=provinces',
			$vName == 'provinces'
		);
                JSubMenuHelper::addEntry(
			JText::_('District'),
			'index.php?option=com_property&view=districts',
			$vName == 'districts'
		);
	}
	public static function getActions($ownerId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;               
		if (empty($ownerId)) {
			$assetName = 'com_property';
		} else {
			$assetName = 'com_property.owner.'.(int) $ownerId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}