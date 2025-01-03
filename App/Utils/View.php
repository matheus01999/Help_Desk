<?php

namespace App\Utils;

Class View{

     private static function getContentView($view){
          $file =__dir__  .'/../../resources/view/'.$view.'.html';
          return file_exists($file) ? file_get_contents($file) : 'Pagina não localizada ==> '.$file ;

     }


     // Métpdp responsavel por retornar o conteúdo de uma view
     public static function render($view, $vars=[]){

          $contentView = self::getContentView($view);

          // Chaves do Array $vars
          $keys = array_keys($vars);
          $keys = array_map(function($item){
               return '{{'.$item.'}}';
          }, $keys);

          return str_replace($keys,array_values($vars),$contentView) ;
          
     }
}