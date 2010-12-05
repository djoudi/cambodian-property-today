<?php
$path = JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."lib".DS."wideimage".DS."WideImage.php" ;
require_once $path;

class PropertyImage extends WideImage {
   public static function getImagePropertyThumb($image_str){
      $filename = basename($image_str);
      $thumb = "thumb-{$filename}";
      
      $image_path = JPATH_ROOT.DS."images".DS."propertyimage".DS."thumb".DS.$thumb;
      if(!file_exists($image_path)){
          $image_str = str_replace("/", DS, $image_str);
          $full_path = JPATH_ROOT.DS.$image_str;

          $image = WideImage::load($full_path);      
          $image->resize(50, 30)->saveToFile($image_path);
      }
      return $thumb ;
    }

    public static function getImagePropertyListThumb($image_str,$width=170,$height=130){
      $file = basename($image_str);
      $thumb = "list-{$file}";
      $image_path = JPATH_ROOT.DS."images".DS."propertyimage".DS."thumb".DS.$thumb;
      if(!file_exists($image_path)){
          $image_str = str_replace("/", DS, $image_str);
          $full_path = JPATH_ROOT.DS.$image_str;
          $image = WideImage::load($full_path);
          $image = $image->resize($width,$height);



          $watermark_path = JPATH_ROOT.DS."images".DS."propertyimage".DS."logo".DS."watermark.png";
          if(!file_exists($watermark_path)){
             $watermark_path = JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."images".DS."watermark.png";
          }
          $watermark = WideImage::load($watermark_path);

          $w_width = $watermark->getWidth();
          $w_height = $watermark->getHeight();

          $x = intval(ceil( $width / ($w_width +10)));
          $y = intval(ceil( $height /($w_height + 10)));


          if($x && $y){
            for($i=0;$i<$y;$i++){
                for($j=0;$j<$x;$j++){
                    $left = $j * ($w_width + 10);
                    $top =  $i * ($w_height + 10) ;
                    $image = $image->merge($watermark,$left,$top,100);
                }
            }
          }
          #$canvas->useFont('path/to/arial.ttf', 16, $image->allocateColor(0, 0, 0));
          #$image->resize($width,$height);
          $image->saveToFile($image_path);
      }
      return $thumb ;
    }
    //==========================================================================
    public static function getImageProperty($image_str){
      $file = basename($image_str);
      $thumb = "cpt-{$file}";
      $image_path = JPATH_ROOT.DS."images".DS."propertyimage".DS."thumb".DS.$thumb;
      if(!file_exists($image_path)){
          $image_str = str_replace("/", DS, $image_str);
          $full_path = JPATH_ROOT.DS.$image_str;
          $image = WideImage::load($full_path);

          $width = $image->getWidth();
          $height = $image->getHeight();

          if($width>1000){
              $radio = (1000/$width)*100;
              $image = $image->resize("{$radio}%");
          }
          if($height > 800){
              $radio = (800/$height)*100;
              $image = $image->resize ("{$radio}%");
          }
          
          // get the new size after ajustment
          $width = $image->getWidth();
          $height = $image->getHeight();

          $watermark_path = JPATH_ROOT.DS."images".DS."propertyimage".DS."logo".DS."watermark.png";
          if(!file_exists($watermark_path)){
             $watermark_path = JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."images".DS."watermark.png";
          }

          $watermark = WideImage::load($watermark_path);

          $w_width = $watermark->getWidth();
          $w_height = $watermark->getHeight();

          $x = intval(ceil( $width / ($w_width +10)));
          $y = intval(ceil( $height /($w_height + 10)));


          if($x && $y){
            for($i=0;$i<$y;$i++){
                for($j=0;$j<$x;$j++){
                    $left = $j * ($w_width + 10);
                    $top =  $i * ($w_height + 10) ;
                    $image = $image->merge($watermark,$left,$top,100);
                }
            }
          }
          #$canvas->useFont('path/to/arial.ttf', 16, $image->allocateColor(0, 0, 0));
          #$image->resize($width,$height);
          $image->saveToFile($image_path);
      }
      return $thumb ;
    }
}



?>
