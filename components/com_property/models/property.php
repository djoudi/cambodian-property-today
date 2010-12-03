<?php
// No direct access.
defined('_JEXEC') or die;
jimport('joomla.application.component.modelitem');
class PropertyModelProperty extends JModelItem
{
    public function getProperty($id){
        $db	= $this->getDbo();
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
        $query->where(" a.id='{$id}'");
        $query->where(" a.published = 1");
        $db->setQuery($query);

        $row = $db->loadObject();
        return $row;

    }
}
