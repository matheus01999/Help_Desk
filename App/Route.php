<?php


namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['homepage'] = array(
			'route' => '/homepage',
			'controller' => 'AppController',
			'action' => 'homepage'
		);


		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		// Rotas do Usuario 

		$routes['addUsuario'] = array( //Rota responsavel pela renderização da View para adicionar o usuario
			'route' => '/addUsuario',
			'controller' => 'AppController',
			'action' => 'addUsuario'
		);

		$routes['salvarUsuario'] = array( //Rota responsavel por salvar o usuario
			'route' => '/salvarUsuario',
			'controller' => 'AppController',
			'action' => 'salvarUsuario'
		);

		//Rotas de Chamado

		$routes['addChamado'] = array( //Rota responsavel pela renderização da View para adicionar o usuario
			'route' => '/addChamado',
			'controller' => 'AppController',
			'action' => 'addChamado'
		);

		$routes['salvarChamado'] = array( //Rota responsavel pela renderização da View para adicionar o usuario
			'route' => '/salvarChamado',
			'controller' => 'AppController',
			'action' => 'salvarChamado'
		);

		$routes['excluirChamado'] = array( //Rota responsavel pela renderização da View para adicionar o usuario
			'route' => '/excluirChamado',
			'controller' => 'AppController',
			'action' => 'excluirChamado'
		);





		$this->setRoutes($routes);
	}

}

?>