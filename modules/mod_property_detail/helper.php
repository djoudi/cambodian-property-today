<?php

require_once(JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."models".DS."property.php");
class PropertyDetailHelper{
    public static function getProperty($type){
        $db = JFactory::getDBO();
        if($type==2) {// random
            $sql = "SELECT id FROM #__ch_property ORDER BY RAND() LIMIT 1 ";
            $db->setQuery($sql);
            $id = $db->loadResult();
        }
        else{ // latest
            $sql = "SELECT id FROM #__ch_property ORDER BY ID DESC LIMIT 1";
            $db->setQuery($sql);
            $id = $db->loadResult();
        }

        $query	= $db->getQuery(true);
        $query->select("a.*
        ");

        $query->from('`#__ch_property` AS a');

        $query->select('c.title AS category_type');
        $query->select('d.name as district_name');
        $query->select('p.name as province_name');

        $query->join('LEFT', '#__categories AS c ON c.id = a.id_type');
        $query->join('LEFT', "#__ch_district AS d ON d.id = a.id_district");
        $query->join('LEFT', "#__ch_province AS p ON p.id = d.id_province");
        $query->where("a.id='{$id}'");
        $db->setQuery($query);

        $row = $db->loadObject();
        return $row;
        $prop = new PropertyModelProperty();        
        $row = $prop->getProperty($id);
        return $row;

        

    }
}


?>