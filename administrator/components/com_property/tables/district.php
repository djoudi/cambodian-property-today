<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');

class PropertyTableDistrict extends JTable
{
    var $id=null;
    var $name= null;
    var $slug= null;
    var $description= null;
    var $id_province = null;
    var $published = null;
    
    function __construct(&$db)
    {
            parent::__construct('#__ch_district', 'id', $db);
    }
}

