<?php

namespace App\Controllers;

//os recursos do miniframework
use App\DB\Database;
use App\Models\Chamado;
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{

    public function homepage()
    {
        session_start();

        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            //intancia do smodelos
            $chamado = Container::getModel('Chamado');
            $usuario = Container::getModel('Usuario');

            //recuperar usuarios e chamados 
            $this->view->usuarios = $usuario->listar();
            $this->view->chamados = Chamado::getChamados();
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

    public function inserirChamado(){

        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
        $chamado = Container::getModel('Chamado');
        $chamado->id_usuario = $_SESSION['id'];
        $chamado->titulo = $_POST['titulo'];
        $chamado->categoria = $_POST['categoria'];
        $chamado->descricao = $_POST['descricao'];
        $chamado->salvar();

        header('Location: /homepage?Chamado_salvo');

    }else{header('Location: /?login=erro');
    }

}



    public function excluirChamado()
    {
        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            $chamado = Container::getModel('Chamado');
            $chamado->__set('id', $_GET['id']);

            $chamado->excluir();
            header('Location: /homepage?Chamado_removido');
        }
    }

    public function editarChamado() {
        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            $chamado = Container::getModel('Chamado');

            $chamado->__set('id', $_POST['id']);
            $chamado->__set('titulo', $_POST['titulo']);
            $chamado->__set('categoria', $_POST['categoria']);
            $chamado->__set('descricao', $_POST['descricao']);

            $chamado->editar();


            header('Location: /homepage');

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

        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            $usuario = Container::getModel('Usuario');

            $usuario->__set('nome', $_POST['nome']);
            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);

            $usuario->salvar();
            header('Location: /homepage?Usuario_salvo');
        }

        //trabalhar em uma validação
    }

    public function excluirUsuario()
    {
        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            
            $usuario = Container::getModel('Usuario');
            $usuario->__set('id', $_GET['id']);
            $usuario->excluir();
            header('Location: /homepage?Usuario_removido');

        }


    }



    
        
    }



