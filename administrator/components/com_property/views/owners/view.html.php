<?php
/**
 * @version		$Id: view.html.php 18759 2010-09-02 11:04:00Z infograf768 $
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of clients.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_banners
 * @since		1.6
 */
class PropertyViewOwners extends JView
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{      
		// Initialise variables.
		$this->items		= $this->get('items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');     
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.'/helpers/property.php';

		$canDo	= PropertyMenuHelper::getActions();

		JToolBarHelper::title(JText::_('Owners Management'), 'banners-clients.png');
		if ($canDo->get('core.create')) {
			JToolBarHelper::addNew('owner.add','JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit')) {
			JToolBarHelper::editList('owner.edit','JTOOLBAR_EDIT');
		}

		if ($canDo->get('core.edit.state')) {
                    if ($this->state->get('filter.state') != 2){
			JToolBarHelper::divider();
			JToolBarHelper::custom('owners.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			JToolBarHelper::custom('owners.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			//JToolBarHelper::divider();
			//JToolBarHelper::archiveList('owner.archive','JTOOLBAR_ARCHIVE');
			//JToolBarHelper::custom('owner.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
                    }
                }



		if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'owners.delete','JTOOLBAR_EMPTY_TRASH');
			JToolBarHelper::divider();
		} else if ($canDo->get('core.edit.state')) {
			JToolBarHelper::trash('owners.trash','JTOOLBAR_TRASH');
			JToolBarHelper::divider();
		}

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_property');
			JToolBarHelper::divider();
		}

		JToolBarHelper::help('Owner');
	}
}
