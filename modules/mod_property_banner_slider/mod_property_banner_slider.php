<?php
    require_once dirname(__FILE__).DS.'helper.php';
    $id_category = $params->get("id_category");
    $items = ProperyBannerSliderHelper::getBanners($id_category);

    require(JModuleHelper::getLayoutPath('mod_property_banner_slider','default'));

?>