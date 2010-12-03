<?php
    require_once (dirname(__FILE__).DS.'helper.php');
    $type = $params->get("type");
    $item = PropertyDetailHelper::getProperty($type);
    
    require JPATH_BASE.DS."components".DS."com_property".DS."helpers".DS."propertyitem.php";
?>