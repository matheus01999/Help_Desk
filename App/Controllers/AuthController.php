<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

// CLASE RESPONSAVEL POR CONTROLAR A AUTENTICAÇÃO
class AuthController extends Action
{

    // METODO RESPONSAVEL PELA AUTENTICAÇÃO DO USUARIO
    public function autenticar()
    {
        // INTÂNCI ADO MODELO DE USUSARIO
        $usuario = Container::getModel('Usuario');

        // ATRIBUI OS VALORES RECEBIDOS POR POST AO MODELO USUARIO
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);

        // CHAMAO O METODO AUTENTICAR DO MODELO USUSARIO 
        $usuario->autenticar();
        
        // VALIDA SE O CAMPOS ID E NOME ESTÃO VAZIOS 
        if($usuario->__get('id') != '' && $usuario->__get('nome')){
            session_start();
            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['nome'] = $usuario->__get('nome');

            // REDIRECIONA PARA HOMEPAGE 
            header('Location: /homepage');
        }else{
            header('Location: /?login=erro');
        }
    }

    // METODO RESPONSAVEL POR FAZER O LOGOUT DO USUARIO
    public function sair(){
        session_start();
        session_destroy();
        header('Location: /');
    }
}
?>