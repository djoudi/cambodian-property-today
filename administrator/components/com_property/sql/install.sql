CREATE TABLE IF NOT EXISTS `jos_ch_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;


CREATE TABLE IF NOT EXISTS `jos_ch_booking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `passport_id` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `work_address` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `other` varchar(255) NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8   ;


CREATE TABLE IF NOT EXISTS `jos_ch_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `id_province` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8  ;


CREATE TABLE IF NOT EXISTS `jos_ch_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;


CREATE TABLE IF NOT EXISTS `jos_ch_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `street` varchar(50) NOT NULL,
  `commune` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `tel1` varchar(50) NOT NULL,
  `tel2` varchar(50) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state` tinyint(3) NOT NULL,
  `checked_out` int(10) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `jos_ch_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agent` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_province` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `list` int(11) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `picture` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_type` int(11) NOT NULL,
  `price` double NOT NULL,
  `property_state` varchar(100) NOT NULL,
  `commision_type` varchar(50) NOT NULL,
  `price_in_sq` float NOT NULL,
  `style` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `commision` float NOT NULL,
  `size_lot` varchar(255) NOT NULL,
  `size_house` decimal(10,0) NOT NULL,
  `location_address` varchar(255) NOT NULL,
  `location_street` varchar(255) NOT NULL,
  `location_commune` varchar(100) NOT NULL,
  `location_district` varchar(100) NOT NULL,
  `location_province` varchar(100) NOT NULL,
  `location_area` varchar(100) NOT NULL,
  `feature_story` int(11) NOT NULL,
  `feature_floor` int(11) NOT NULL,
  `feature_bedroom` int(11) NOT NULL,
  `feature_bathroom` int(11) NOT NULL,
  `feature_livingroom` int(11) NOT NULL,
  `feature_dinningroom` int(11) NOT NULL,
  `feature_kitchen` int(11) NOT NULL,
  `feature_balcany` int(11) NOT NULL,
  `feature_terrace` bigint(20) NOT NULL,
  `feature_garden` int(11) NOT NULL,
  `feature_parking` int(11) NOT NULL,
  `feature_pool` int(11) NOT NULL,
  `feature_other` text NOT NULL,
  `equipment_bed` int(11) NOT NULL,
  `equipment_mattress` int(11) NOT NULL,
  `equipment_cloth` int(11) NOT NULL,
  `equipment_dressingtable` int(11) NOT NULL,
  `equipment_cupboard` int(11) NOT NULL,
  `equipment_dinningtable` int(11) NOT NULL,
  `equipment_chair` int(11) NOT NULL,
  `equipment_sofa` int(11) NOT NULL,
  `equipment_cabinet` int(11) NOT NULL,
  `equipment_aircon` int(11) NOT NULL,
  `equipment_gasstove` int(11) NOT NULL,
  `equipment_microwave` int(11) NOT NULL,
  `equipment_refrigerator` int(11) NOT NULL,
  `equipment_tv` int(11) NOT NULL,
  `equipment_fan` int(11) NOT NULL,
  `equipment_standingfan` int(11) NOT NULL,
  `equipment_satellitedish` int(11) NOT NULL,
  `equipment_fax` int(11) NOT NULL,
  `equipment_generator` int(11) NOT NULL,
  `equipment_other` text NOT NULL,
  `service_electricity` int(11) NOT NULL,
  `service_water` int(11) NOT NULL,
  `service_garbage` int(11) NOT NULL,
  `service_security` int(11) NOT NULL,
  `service_pestcontrol` int(11) NOT NULL,
  `service_cabletv` int(11) NOT NULL,
  `service_laundry` int(11) NOT NULL,
  `service_swimmingpool` int(11) NOT NULL,
  `service_idd` int(11) NOT NULL,
  `service_fax` int(11) NOT NULL,
  `service_newspaper` int(11) NOT NULL,
  `service_credit` int(11) NOT NULL,
  `service_internet` int(11) NOT NULL,
  `service_other` int(11) NOT NULL,
  `checked_out` tinyint(10) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `state` tinyint(3) NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8  ;


CREATE TABLE IF NOT EXISTS `jos_ch_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

