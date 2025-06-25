<?php

namespace App\Controllers;


use App\DB\Database;
use App\Models\Chamado;
use App\Models\Usuario;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{

    // Renderização da View Homepage
    public function homepage()
    {
        session_start();
        // VALIDAÇÃO DE LOGIN
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DOS MODELOS
            $chamado = Container::getModel('Chamado');
            $usuario = Container::getModel('Usuario');

            // RECUPERAÇÃO DOS REGISTROS DOS BANCO
            $this->view->usuarios = $usuario->listar();
            $this->view->chamados = $chamado->listar();


            $this->render('homepage');
        } else {
            header('Location: /?login=erro');
        }
    }



    // RENDERIZAÇÃO DA VIEW addChamado
    public function addChamado()
    {
        session_start();
        // VALIDAÇÃO DE LOGIN
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            $this->render('addChamado');
        } else {
            header('Location: /?login=erro');
        }
    }

    // METODO RESPONSAVEL POR SALVAR UM CHAMADO NO BANCO
    public function inserirChamado()
    {

        session_start();
        // VALIDAÇÃO DE LOGIN 
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DO MODELO CHAMADO
            $chamado = Container::getModel('Chamado');

            // GERAR UM VALOR PARA O TICKET
            // ELABORAR**


            // SETANDO OS VALUES COM OS $_POST RECEBIDOS DO AddChamados
            $chamado->id_usuario = $_SESSION['id'];
            $chamado->categoria = $_POST['categoria'];
            $chamado->descricao = $_POST['descricao'];

            // SALVA O REGISTRO NO BANCO
            $chamado->salvar();

            // REDIRENCIONA PARA VIEW HOMEPAGE COM O STATUS DE CHAMADO SALVO
            header('Location: /homepage?Chamado_salvo');
        } else {
            header('Location: /?login=erro');
        }
    }

    // METODO RESPONSAVEL POR EDITAR UM CHAMADO NO BANCO
    public function editarChamado()
    {
        // VALIDAÇÃO DO LOGIN
        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DO MODELO CHAMADO
            $chamado = Container::getModel('Chamado');

            // SETANDO OS VALUES COM OS $_POST RECEBIDOS DO MODEL DE EDIÇÃO
            $chamado->__set('id', $_POST['id']);
            $chamado->__set('titulo', $_POST['titulo']);
            $chamado->__set('categoria', $_POST['categoria']);
            $chamado->__set('descricao', $_POST['descricao']);

            // EDITANDO O REGISTRO NO BANCO 
            $chamado->editar();

            // REDIRECIONA PARA VIEW HOMEPAGE
            header('Location: /homepage');
        }
    }


    // METODO RESPONSAVEL POR EXCLUIR UM CHAMADO DO BANCO
    public function excluirChamado()
    {
        
        session_start();
        // VALIDAÇÃO DE LOGIN
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DO MODELO CHAMADO
            $chamado = Container::getModel('Chamado');
            
            // SETA O VALOR DE ID COM $_GET DO BUTTON EXCLUIR DA Homepage
            $chamado->__set('id', $_GET['id']);

            // EXCLUI O REGISTRO DO BANCO
            $chamado->excluir();

            // REDIRECIONA PARA HOMEPAGE COM O STATUS DE CHAMADO REMOVIDO
            header('Location: /homepage?Chamado_removido');
        }
    }




    
    // RENDERIZAÇÃO DA VIEW AddUsuario
    public function addUsuario()
    {
        session_start();
        // VALIDAÇÃO DO LOGIN
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            $this->render('addUsuario'); 
        } else {
            header('Location: /?login=erro');
        }
    }

    // METODO RESPONSAVEL POR SALVAR UM USUARIO NO BANCO
    public function salvarUsuario()
    { 
        
        session_start();
        // VALIDAÇÃO DO LOGIN
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            
            // INSTÂNCIA DO MODELO USUARIO
            $usuario = Container::getModel('Usuario');

            // SETANDO OS VALUES COM OS $_POST DO FORM DE AddUsuario
            $usuario->__set('nome', $_POST['nome']);
            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);

            // SALVANDO O REGISTRO NO BANCO
            $usuario->salvar();

            // REDIRECIONA PARA HOMEPAGE COM O STATUS DE USUARIO SALVO 
            header('Location: /homepage?Usuario_salvo');
        }

        //trabalhar em uma validação
    }

    // METODO RESPONSAVEL POR EXCLUIR UM USUARIO DO BANCO
    public function excluirUsuario()
    {
        session_start();
        // VALIDAÇÃO DE LOGIN
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DO MODELO USUARIO
            $usuario = Container::getModel('Usuario');

            // SETA O VALOR DE ID RECEBIDO PELO GET DO BUTTON EXCLUIR DA HOMEPAGE
            $usuario->__set('id', $_GET['id']);

            // EXCLUI O REGISTRO DO BANCO
            $usuario->excluir();

            // REDIRECIONA PARA HOMEPAGE COM O STATUS DE USUARIO REMOVIDO
            header('Location: /homepage?Usuario_removido');
        }
    }
}
