<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

class PropertyModelProperties extends JModelList
{

    protected function getListQuery()
    {
        $this->setState("list.limit",12);
        $start = JRequest::getVar("limitstart",0);
        $this->setState ("list.start", $start);

        $task = JRequest::getVar("task");
        if($task=="search")
            $query = $this->getSearchQuery();
        else
            $query = $this->getListingQuery();

        return $query;

    }
    public function getListingQuery(){
        $task = JRequest::getVar("task");
        $type = JRequest::getVar("type");


        $db	= $this->getDbo();
        $query	= $db->getQuery(true);
        $query->select("a.*
        ");

        $query->from('`#__ch_property` AS a');

        $query->select('c.title AS category_type');
        $query->select('o.name as owner_name, o.id as owner_id');
        $query->select('d.name as district_name');
        $query->select('p.name as province_name');


        $query->join('LEFT', '#__categories AS c ON c.id = a.id_type');
        $query->join('LEFT', "#__ch_owner AS o ON o.id = a.id_owner");
        $query->join('LEFT', "#__ch_district AS d ON d.id = a.id_district");
        $query->join('LEFT', "#__ch_province AS p ON p.id = d.id_province");
        $query->where(" a.published = 1");

        $query->order(" a.id ") ;

        if( $task=="rent" || $type=="rent")
            $query->where("a.list = 1 ");
        else if($task=="sale" || $type=="sale")
            $query->where("a.list = 2");
        else if($task=="pawn" || $type=="pawn")
            $query->where("a.list = 3");
        else if($task=="sublease" || $type=="sublease")
            $query->where("a.list = 4");
        return $query;
    }

    public function getSearchQuery(){
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select("a.* ");
        $query->from("#__ch_property AS a");


        $query->select('c.title AS category_type');
        $query->select('d.name as district_name');
        $query->select('p.name as province_name');

        $query->join('LEFT', "#__ch_district AS d ON d.id = a.id_district");
        $query->join('LEFT', "#__ch_province AS p ON p.id = d.id_province");
        $query->join('LEFT', '#__categories AS c ON c.id = a.id_type');
        $query->where(" a.published = 1");

        $form_data = JRequest::getVar("jform",array());
        
        if($form_data["list"])
            $query->where("a.list = '{$form_data["list"]}' ");

        if($form_data["id_type"])
            $query->where("a.id_type = '{$form_data["id_type"]}' ");

        if($form_data["id_province"])
            $query->where("a.id_province = '{$form_data["id_province"]}' ");

        if($form_data["id_district"])
            $query->where("a.id_district = '{$form_data["id_district"]}' ");
            
        if($form_data["price"]){
           $prices = explode("-", $form_data["price"]);
           $min = str_replace(" ", "", $prices[0]);
           if(count($prices)>1){
                $max = str_replace(" ", "", $prices[1]);
                $query->where("a.price >= {$min} ");
                $query->where("a.price < {$max}");
           }
           else
               $query->where("a.price > {$min} ");
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

        $this->setState("list.limit",3);

        $state = $app->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
        $this->setState('filter.state', $state);

        $propertyId = $app->getUserStateFromRequest($this->context.'.filter.id', 'filter_id', '');
        $this->setState('filter.id', $propertyId);

        // List state information.
        parent::populateState('ref', 'asc');
    }
    
}