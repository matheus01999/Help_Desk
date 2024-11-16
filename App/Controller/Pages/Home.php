<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

Class Home extends Page{

     /**
      * Método responsável por retornar o conteúdo (View) da home 
      * @return string
      */
     public static function gethome(){

          $obOrganization = new Organization;

          $content = View::render('pages/home', [
               'name' => $obOrganization->name,
               'description' => 'Canal',
               'conte' => 'loren'
          ]);

          return parent::getPage('main', $content);
     }
}