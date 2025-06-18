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

        $chamado = Container::getModel('Chamado');

        $chamado->__set('titulo', $_POST['titulo']);
        $chamado->__set('categoria', $_POST['categoria']);
        $chamado->__set('descricao', $_POST['descricao']);

        // Trabalhar em uma validação 

        $chamado->salvar();
        $this->view->Chamado_salvo = true;
        $this->render('homepage');

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

            $this->view->Usuario_salvo = true;
            $this->render('homepage');
        } else {

            $this->view->usuario = array(
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
            );

            $this->view->erroCadastro;
            $this->render('addUsuario');
        }
    }
}
