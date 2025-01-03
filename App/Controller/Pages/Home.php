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
          //Organização
          $obOrganization = new Organization;

          $content = View::render('pages/home',[
               'name' => $obOrganization->name,
               'description' => $obOrganization->description]);
               return parent::getPage('Aplicação', $content);
     }
}