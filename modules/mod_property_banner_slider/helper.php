<?php
class ProperyBannerSliderHelper{

    static public function getBanners($catid){
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select("a.*");
        $query->from("#__banners AS a");
        if($catid)
            $query->where("catid ='{$catid}'");
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        return $rows;
    }
}


?>