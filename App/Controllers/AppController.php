<?php

namespace App\Controllers;



use App\Models\Chamado;
use MF\Controller\Action;
use MF\Model\Container;


// CLASE CONTROLADORA DA APLICAÇÃO
class AppController extends Action
{

    // METODO RESPOSAVEL POR RENDERIZAR A HOMEPAGE
    public function homepage()
    {
        // INICIA A SESSÃO
        session_start();

        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DOS MODELOS DE CHAMADO E USUARIO
            $chamado = Container::getModel('Chamado');
            $usuario = Container::getModel('Usuario');

            // LISTA OS REGISTROS DE USUARIOS E CHAMADOS
            $this->view->usuarios = $usuario->listar();
            //$this->view->chamados = Chamado::getChamados();
            $this->render('homepage'); // HOMEPAGE DO USUARIO
        } else {
            // EM CASO DE ERRO REDIRECIA PARA PAGINA /
            header('Location: /?login=erro');
        }
    }



    // METODO RESPONSAVEL POR RENDERIZAR A PAGINA COM O FORM DE CADASTRO DE CHAMADO
    public function addChamado()
    {

        session_start();
        // VALIDAÇÃO DA SESSION
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // RENDERIZA A PAGINA COM O FORM DE CADASTRO DE CHAMADI
            $this->render('addChamado');
        } else {
            // EM CASO DE ERRO REDIRECIA PARA PAGINA /
            header('Location: /?login=erro');
        }
    }

    // METODO RESPONSAVEL POR SALVAR UM CHAMADO NO BANCO
    public function salvarChamado()
    {

        // VALIDAÇÃO DA SESSION
        session_start();
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DO MODELO CHAMADO 
            $chamado = Container::getModel('Chamado');

            // ATRIBUI OS VALORES RECEBIDOS POR $_POST AO MODELO
            $chamado->id_usuario = $_SESSION['id'];
            $chamado->titulo = $_POST['titulo'];
            $chamado->categoria = $_POST['categoria'];
            $chamado->descricao = $_POST['descricao'];
            // CHAMA O METODO SALVAR NO MODELO CHAMADO
            $chamado->salvar();
            // REDIRECIA PARA A HOMEPAGE COM O STATUS DE CHAMADO SALVO COM SUCESSO 
            header('Location: /homepage?Chamado_salvo');

        } else {
            // EM CASO DE ERRO NA VALIDAÇÃO DA SESSION, REDIRECIONA PARA LOGIN PAGE
            header('Location: /?login=erro');
        }

    }


    // METODO RESPONSAVEL POR EXCLUIR UM CHAMADO DO BANCO
    public function excluirChamado()
    {
        session_start();
        // VALIDAÇÃO DA SESSION
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INTÂNCIA DO MODELO CHAMADO
            $chamado = Container::getModel('Chamado');

            // SET O VALOR DE ID COM O RECEBIDO PELO $_GET 
            $chamado->__set('id', $_GET['id']);

            // CHAMA O METODO EXCLUIR DO MODELO CHAMADO, QUE USA O ID PARA EXCLUIR O REGISTRO
            $chamado->excluir();
            //REDIRECIONA PARA HOMEOPAGE COM O STATUS DE CHAMADO REMOVIDO
            header('Location: /homepage?Chamado_removido');
        }
    }

    // METODO RESPONSAVEL POR EDITAR UM CHAMAOD DO BANCO
    public function editarChamado()
    {
        session_start();
        // VALIDAÇÃO DA SESSION
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INTÂNCIA DO MODELO Chamado
            $chamado = Container::getModel('Chamado');

            // ATRIBUI OS VALORES RECEBIDOS POR POST AO OBJETO INSTANCIADO
            $chamado->__set('id', $_POST['id']);
            $chamado->__set('titulo', $_POST['titulo']);
            $chamado->__set('categoria', $_POST['categoria']);
            $chamado->__set('descricao', $_POST['descricao']);

            // CHAMA O METODO EDITAR DO MODELO CHAMADO
            $chamado->editar();

            // REDIRECIONA PARA AHOMEPAGE
            header('Location: /homepage');

        }
    }


    // METODO RESPONSAVEL POR RENDERIZAR O FORM COM CADASTRO DE USUSARIO
    public function addUsuario()
    {
        session_start();
        // VALIDAÇÃO DA SESSION
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
            // RENDERIZA A FORM DE CADASTRO DE USUARIO
            $this->render('addUsuario');  
        } else {
            // EM CASO DE ERRO DA SESSION RENDERIZA PARA LOGIN PAGE
            header('Location: /?login=erro');
        }
    }

    // METODO RESPONSAVEL POR POR SALVAR UM USUARIO NO BANCO
    public function salvarUsuario()
    { 

        session_start();
        // VALIDAÇÃO DA SESSION
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DO MODELO USUARIO
            $usuario = Container::getModel('Usuario');

            // ATRIBUI OS VALORES RECEBIDOS POR POST AO MODELO USUARIO
            $usuario->__set('nome', $_POST['nome']);
            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);

            // CHAMA O METODO SALVAR DO MODELO USUARIO
            $usuario->salvar();

            // RENDERIZA PARA HOMEPAGE COM O STATUS DE USUARIO SALVO
            header('Location: /homepage?Usuario_salvo');
        }

        
    }

    // METODO RESPONSAVEL POR EXCLUIR UM USUARIO DO BANCO
    public function excluirUsuario()
    {
        session_start();
        // VALIDAÇÃO DA SESSION
        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

            // INSTÂNCIA DO MODELO USUARIO
            $usuario = Container::getModel('Usuario');
            // ATRIBUI O VALOR DE ID AO MODELO INSTÂNCIADO 
            $usuario->__set('id', $_GET['id']);
            
            // CHAMA O METODO QUE EXCLUI UM USUARIO DO BANCO COM BASE NO ID ATRIBUIDO
            $usuario->excluir();

            // REDIRECIONA PARA A HOMEPAGE COM O STATUS DE USUARIO REMOVIDO
            header('Location: /homepage?Usuario_removido');

        }


    }





}



