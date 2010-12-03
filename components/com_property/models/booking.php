<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.modelitem');
require_once JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."tables".DS."booking.php";
class PropertyModelBooking extends JModelItem
{
    protected $_context = 'com_contact.contact';
    
    public function save($data){
        $table = $this->getTable("booking","PropertyTable");
        if(!$table->bind($data)){
            ch_debug($table->getError(),1);
        }
        if(!$table->check($data)){
           ch_debug($table->getError(),1);
        }
        if(!$table->store()){
           ch_debug($table->getError(),1);
        }
        return $table;
    }

    public function getBooking($id){

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select("b.*");
        $query->from("#__ch_booking AS b");
        $query->where("b.id = '{$id}'");
        $sql = $query->__toString();
        $db->setQuery($query);
        $row = $db->loadAssoc();
        return $row;

    }
}