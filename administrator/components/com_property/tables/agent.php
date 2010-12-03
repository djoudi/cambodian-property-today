<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
// import Joomla table library
jimport('joomla.database.table');
/**
 * Hello Table class
 */
class PropertyTableAgent extends JTable
{
    var $id=null;
    var $name= null;
    var $tel = null;
    var $email = null;
    var $description = null;
    var $position = null;

    function __construct(&$db)
    {
            parent::__construct('#__ch_agent', 'id', $db);
    }
}

