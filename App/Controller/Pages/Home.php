<?php

namespace App\Controller\Pages;
use \App\Utils\View;

Class Home{

     /**
      * Método responsável por retornar o conteúdo (View) da home 
      * @return string
      */
     public static function gethome(){
          return View::render('pages/home');
     }
}