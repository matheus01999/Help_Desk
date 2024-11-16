<?php

namespace App\Utils;

Class View{

     /**
      * Método reponsável por retornar o centeúso de uma view 
      * @param string $view
      * @return string
      */
     private static function getContentView($view){
          $file =__dir__  .'/../../resources/view/'.$view.'.html';
          return file_exists($file) ? file_get_contents($file) : 'Pagina não localizada ==> '.$file ;

     }

     /**
      * Método resposavel por retornar o cnteúdo renderizado de uma view
      * @param $view
      * @param array $vars
      */
     public static function render($view, $vars = []){

          $contentView = self::getContentView($view);

          //Chaves do Array
          $keys = array_keys($vars);
          $keys = array_map(function($item){
               return '{{'.$item.'}}';
          },$keys);

          return str_replace($keys, array_values($vars),$contentView);
          
     }
}