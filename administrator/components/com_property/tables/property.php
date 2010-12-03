<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');

class PropertyTableProperty extends JTable
{
	var $id=null;
        var $id_agent=null;
        var $id_owner=null;
        var $ref=null;
        var $list=null;
        var $tel=null;
        var $date=null;
        var $picture=null;
        var $start_date=null;
        var $end_date=null;
        var $id_type=null;
        var $price=null;
        var $property_state=null;
        var $commision_type=null;
        var $price_in_sq=null;
        var $style=null;
        var $condition=null;
        var $commision=null;
        var $size_lot=null;
        var $size_house=null;
        var $location_address=null;
        var $location_street=null;
        var $location_commune=null;
        var $location_district=null;
        var $location_province=null;
        var $location_area=null;
        var $feature_story=null;
        var $feature_floor=null;
        var $feature_bedroom=null;
        var $feature_bathroom=null;
        var $feature_livingroom=null;
        var $feature_dinningroom=null;
        var $feature_kitchen=null;
        var $feature_balcany=null;
        var $feature_terrace=null;
        var $feature_garden=null;
        var $feature_parking=null;
        var $feature_pool=null;
        var $feature_other=null;
        var $equipment_bvd=null;
        var $equipmes=null;
        var $equipment_cloth=null;
        var $equipment_dressingtable=null;
        var $equipment_cupboard=null;
        var $equipment_dinningtable=null;
        var $equipment_chair=null;
        var $equipment_sofa=null;
        var $equipmentinet=null;
        var $equipment_aircon=null;
        var $equipment_gasstove=null;
        var $equipment_microwave=null;
        var $equipment_refrigerator=null;
        var $equipment_tv=null;
        var $equipment_fan=null;
        var $equipment_standingfan=null;
        var $equipment_satellitedish=null;
        var $equipment_fax=null;
        var $equipment_generator=null;
        var $equipment_other=null;
        var $service_electricity=null;
        var $service_water=null;
        var $service_garbage=null;
        var $service_security=null;
        var $service_pestcontrol=null;
        var $service_cabletv=null;
        var $service_laundry=null;
        var $service_swimmingpool=null;
        var $service_idd=null;
        var $service_fax=null;
        var $service_newspaper=null;
        var $service_credit=null;
        var $service_internet=null;
        var $service_other=null;
        var $checked_out=null;
        var $checked_out_time = null;
        var $state = null;
        var $published = null;
        
	function __construct(&$db)
	{
		parent::__construct('#__ch_property', 'id', $db);
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
		$table = JTable::getInstance('Property','PropertyTable');

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
				$table->published = $state;
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

