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



		$this->setRoutes($routes);
	}

}

?>