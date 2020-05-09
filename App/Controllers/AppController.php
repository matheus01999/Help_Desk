<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    public function homepage(){
        session_start();

        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
            $this->render('homepage');
        }else{
            header('Location: /?login=erro');
        }
    }

    public function adduser(){
        session_start();
        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
            $this->render('adduser');
        }else{
            header('Location: /?login=erro');
        }  
    }

    public function consult_chamado(){
        session_start();
        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
            $this->render('consult_chamado');
        }else{
            header('Location: /?login=erro');
        }

    }

    public function newchamado(){
        session_start();
        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
            $this->render('newchamado');
        }else{
            header('Location: /?login=erro');
        }
    }

    public function register_chamado(){
        session_start();
        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
            $this->render('register_chamado');
        }else{
            header('Location: /?login=erro');
        }
    }
}


?>