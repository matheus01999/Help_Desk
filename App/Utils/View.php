<?php

namespace App\Utils;

Class View{

     private static function getContentView($view){
          $file =__dir__  .'/../../resources/view/'.$view.'.html';
          return file_exists($file) ? file_get_contents($file) : 'Pagina não localizada ==> '.$file ;

     }

     public static function render($view){

          $contentView = self::getContentView($view);

          return $contentView;
          
     }
}