<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.modeladmin');
class PropertyModelProvince extends JModelAdmin
{
	protected $text_prefix = 'Province';
	protected function canDelete($record)
	{
            $user = JFactory::getUser();

            if (!empty($record->id))
                    return $user->authorise('core.delete', 'com_property.owner.'.(int) $record->id);
            else
                    return parent::canDelete($record);
	}
	protected function canEditState($record)
	{
		$user = JFactory::getUser();

		if (!empty($record->id)) 
			return $user->authorise('core.edit.state', 'com_property.property.'.(int) $record->id);
		else 
			return parent::canEditState($record);
		
	}

	public function getTable($type = 'Province', $prefix = 'PropertyTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		Data for the form.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	mixed	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_propery.province', 'province', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		// Determine correct permissions to check.
		if ($this->getState('province.id')) {
			// Existing record. Can only edit in selected categories.
			$form->setFieldAttribute('id', 'action', 'core.edit');
		} else {
			// New record. Can only create in selected categories.
			$form->setFieldAttribute('id', 'action', 'core.create');
		}

		// Modify the form based on access controls.
		if (!$this->canEditState((object) $data)) {
			// Disable fields for display.
			$form->setFieldAttribute('ordering', 'disabled', 'true');
			$form->setFieldAttribute('publish_up', 'disabled', 'true');
			$form->setFieldAttribute('publish_down', 'disabled', 'true');
			$form->setFieldAttribute('state', 'disabled', 'true');
			$form->setFieldAttribute('sticky', 'disabled', 'true');

			// Disable fields while saving.
			// The controller has already verified this is a record you can edit.
			$form->setFieldAttribute('ordering', 'filter', 'unset');
			$form->setFieldAttribute('publish_up', 'filter', 'unset');
			$form->setFieldAttribute('publish_down', 'filter', 'unset');
			$form->setFieldAttribute('state', 'filter', 'unset');
			$form->setFieldAttribute('sticky', 'filter', 'unset');
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_property.edit.province.data', array());

		if (empty($data)) {
			$data = $this->getItem();
		}

		return $data;
	}
}
