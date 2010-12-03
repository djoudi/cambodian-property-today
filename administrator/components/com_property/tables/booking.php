<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
class PropertyTableBooking extends JTable
{
	var $id=null;
        var $name= null;
        var $nationality= null;
        var $passport_id= null;
        var $phone= null;
        var $email= null;
        var $current_address= null;
        var $work_address= null;
        var $occupation= null;
        var $position= null;
        var $other= null;
        var $state=null;
        var $checked_out=0;
        var $checked_out_time = null;
        var $published = null;

	function __construct(&$db)
	{
		parent::__construct('#__ch_booking', 'id', $db);
	}
         public function publish($pks = null, $state = 1, $userId = 0)
	{
		// Initialise variables.
		$k = $this->_tbl_key;

		// Sanitize input.
		JArrayHelper::toInteger($pks);
		$userId = (int) $userId;
		$state  = (int) $state;

		// If there are no primary keys set check to see if the instance key is set.
		if (empty($pks))
		{
			if ($this->$k) {
				$pks = array($this->$k);
			}
			// Nothing to set publishing state on, return false.
			else {
				$this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
				return false;
			}
		}

		// Get an instance of the table
		$table = JTable::getInstance('Booking','PropertyTable');

		// For all keys
		foreach ($pks as $pk)
		{
			// Load the banner
			if(!$table->load($pk))
			{
				$this->setError($table->getError());
			}

			// Verify checkout
			if($table->checked_out==0 || $table->checked_out==$userId)
			{
				// Change the state
				$table->state = $state;
				$table->checked_out=0;
				$table->checked_out_time=0;

				// Check the row
				$table->check();

				// Store the row
				if (!$table->store())
				{
					$this->setError($table->getError());
				}
			}
		}
		return count($this->getErrors())==0;
	}
	

      
}

