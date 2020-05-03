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



}


?>