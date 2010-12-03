<?php
   class PFunc {
       static public function getListIn($listin){
           $lists = self::getList();
           return $lists[(int)$listin-1];
       }
       static public function getList(){
           $lists = array("Rent","Sale","Pawn","Sublease");
           return $lists;
       }


   }
?>
