<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		$this->render('index');
	}

	public function newchamado() {
		$this->render('newchamado');
	}

	public function consult_chamado() {
		$this->render('consult_chamado');
	}

	public function homepage() {
		$this->render('homepage');
	}

	public function adduser() {
		$this->render('adduser');
	}

	public function registrar() {
		$usuario = Container::getModel("Usuario");
		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		$usuario->salvar();
	}



}


?>