<?php

namespace App\Controller\Pages;

use \App\Utils\View;

Class Page{

     /**Método resonsável por renderizar o topo da pagina
      * 
      */
     private static function getHeader(){
          return View::render('pages/header');
     }

     /**Método resonsável por renderizar o rodape da pagina
      * 
      */
      private static function getFooter(){
          return View::render('pages/footer');
     }



     public static function getPage($title, $content){
          return View::render('pages/page', [
               'title' => $title,
               'header' =>self::getHeader(),
               'content' => $content,
               'footer' => self::getFooter()
          ]);
     }
}