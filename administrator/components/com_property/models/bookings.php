<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

class PropertyModelBookings extends JModelList
{

    protected function getListQuery()
    {
        // Initialise variables.
        $db		= $this->getDbo();
        $query	= $db->getQuery(true);
        // Select the required fields from the table.
        $query->select(
                'a.*'
        );

        $query->from('`#__ch_booking` AS a');

         // Filter by published state
        $published = $this->getState('filter.state');
        if (is_numeric($published)) {
                $query->where('a.state = '.(int) $published);
        } else if ($published === '') {
                $query->where('(a.state IN (0, 1))');
        }
        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
                if (stripos($search, 'id:') === 0) {
                        $query->where('a.id = '.(int) substr($search, 3));
                } else {
                        $search = $db->Quote('%'.$db->getEscaped($search, true).'%');
                        $query->where('(a.name LIKE '.$search.')');
                }
        }

        return $query;
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     * @return	string		A store id.
     * @since	1.6
     */
    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id	.= ':'.$this->getState('filter.search');
        $id	.= ':'.$this->getState('filter.access');
        $id	.= ':'.$this->getState('filter.state');
        $id	.= ':'.$this->getState('filter.id');

        return parent::getStoreId($id);
    }

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param	type	The table type to instantiate
     * @param	string	A prefix for the table class name. Optional.
     * @param	array	Configuration array for model. Optional.
     * @return	JTable	A database object
     * @since	1.6
     */
    public function getTable($type = 'Booking', $prefix = 'PropertyTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }


    protected function populateState()
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');
        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $state = $app->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
        $this->setState('filter.state', $state);

        $ownerId = $app->getUserStateFromRequest($this->context.'.filter.id', 'filter_id', '');
        $this->setState('filter.id', $ownerId);

        // List state information.
        parent::populateState('name', 'asc');
    }

       
}