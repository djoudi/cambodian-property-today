<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

class PropertyModelProperties extends JModelList
{

    protected function getListQuery()
    {
        $db	= $this->getDbo();
        $query	= $db->getQuery(true);
        $query->select(
                'a.*'
        );

        $query->from('`#__ch_property` AS a');

        $query->select('c.title AS category_name');
        $query->select('o.name as owner_name, o.id as owner_id');
        $query->select("p.name as province_name");
        $query->select("d.name as district_name");


        $query->join('LEFT', '#__categories AS c ON c.id = a.id_type');
        $query->join('LEFT', "#__ch_owner AS o ON o.id = a.id_owner");
        $query->join('LEFT', "#__ch_province AS p ON p.id = a.id_province");
        $query->join('LEFT', "#__ch_district AS d ON d.id = a.id_district");



         $query->where('(a.published IN (0, 1))');



        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0)
                $query->where('a.id = '.(int) substr($search, 3));
            else {
                $search = $db->Quote('%'.$db->getEscaped($search, true).'%');
                $query->where('(a.ref LIKE '.$search.')');
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
    /*
    public function getTable($type = 'Property', $prefix = 'PropertyTable', $config = array())
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

        $propertyId = $app->getUserStateFromRequest($this->context.'.filter.id', 'filter_id', '');
        $this->setState('filter.id', $propertyId);

        // List state information.
        parent::populateState('name', 'asc');
    }
    */
}