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

		$routes['newchamado'] = array(
			'route' => '/newchamado',
			'controller' => 'AppController',
			'action' => 'newchamado'
		);

		$routes['newconfig'] = array(
			'route' => '/newconfig',
			'controller' => 'AppController',
			'action' => 'newconfig'
		);

		$routes['consult_chamado'] = array(
			'route' => '/consult_chamado',
			'controller' => 'AppController',
			'action' => 'consult_chamado'
		);

		$routes['adduser'] = array(
			'route' => '/adduser',
			'controller' => 'AppController',
			'action' => 'adduser'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
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

		$routes['register_chamado'] = array(
			'route' => '/register_chamado',
			'controller' => 'AppController',
			'action' => 'register_chamado'
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



		$this->setRoutes($routes);
	}

}

?>