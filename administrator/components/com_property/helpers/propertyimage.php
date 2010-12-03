<?php
$path = JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."lib".DS."wideimage".DS."WideImage.php" ;
require_once $path;

class PropertyImage extends WideImage {
   public static function getImagePropertyThumb($image_str){
      $filename = basename($image_str);
      $thumb = "thumb_{$filename}";
      
      $image_path = JPATH_ROOT.DS."images".DS."propertyimage".DS."thumb".DS.$thumb;
      if(!file_exists($image_path)){
          $image_str = str_replace("/", DS, $image_str);
          $full_path = JPATH_ROOT.DS.$image_str;
          WideImage::load($full_path)->resize(50, 30)->saveToFile($image_path);
      }
      return $thumb ;
    }

    public static function getImagePropertyListThumb($image_str){
      $file = basename($image_str);
      $thumb = "list_{$file}";

      $image_path = JPATH_ROOT.DS."images".DS."propertyimage".DS."thumb".DS.$thumb;
      if(!file_exists($image_path)){
          $image_str = str_replace("/", DS, $image_str);
          $full_path = JPATH_ROOT.DS.$image_str;
          WideImage::load($full_path)->resize(200, 200)->saveToFile($image_path);
      }
      return $thumb ;
    }
    //==========================================================================    
}



?>
