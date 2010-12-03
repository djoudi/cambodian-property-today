<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
class PropertyTableProvince extends JTable
{
    var $id=null;
    var $name= null;
    var $slug= null;
    var $description= null;
    var $published = null;
    function __construct(&$db)
    {
            parent::__construct('#__ch_province', 'id', $db);
    }

}

