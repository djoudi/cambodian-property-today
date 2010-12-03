<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.modeladmin');
class PropertyModelDistrict extends JModelAdmin
{
	protected $text_prefix = 'District';
	
	public function getTable($type = 'District', $prefix = 'PropertyTable', $config = array())
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
		$form = $this->loadForm('com_propery.district', 'district', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		// Determine correct permissions to check.
		if ($this->getState('district.id')) {
			// Existing record. Can only edit in selected categories.
			$form->setFieldAttribute('id', 'action', 'core.edit');
		} else {
			// New record. Can only create in selected categories.
			$form->setFieldAttribute('id', 'action', 'core.create');
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
		$data = JFactory::getApplication()->getUserState('com_property.edit.district.data', array());

		if (empty($data)) {
			$data = $this->getItem();
		}

		return $data;
	}
}
