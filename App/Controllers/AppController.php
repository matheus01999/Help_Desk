<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{

    public function homepage()
    {
        session_start();

        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            $this->render('homepage'); //Homepage do usuario 
        } else {
            header('Location: /?login=erro');
        }
    }



    //Chamado
    public function addChamado()
    {
        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            $this->render('addChamado'); //Metodo responsavel pela renderização da View de cadastro de chamado
        } else {
            header('Location: /?login=erro');
        }
    }

    public function salvarChamado()
    { // Metodo responsavel por salvar o chamado no banco

        $usuario = Container::getModel('Usuario');

        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);




        if ($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0) {

            $usuario->salvar();

            $this->render('index');
        } else {

            $this->view->usuario = array(
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
            );

            $this->view->erroCadastro = true;

            $this->render('adduser');
        }
    }


    //Usuario

    public function addUsuario()
    {
        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            $this->render('addUsuario'); //Metodo responsavel pela renderização da View de cadastro de Usuario 
        } else {
            header('Location: /?login=erro');
        }
    }

    public function salvarUsuario()
    { // Metodo responsavel por salvar o usuario do banco

        $usuario = Container::getModel('Usuario');

        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);




        if ($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0) {

            $usuario->salvar();

            $this->render('index');
        } else {

            $this->view->usuario = array(
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
            );

            $this->view->erroCadastro = true;

            $this->render('adduser');
        }
    }
}
