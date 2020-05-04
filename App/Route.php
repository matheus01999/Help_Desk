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
			'controller' => 'indexController',
			'action' => 'homepage'
		);

		$routes['newchamado'] = array(
			'route' => '/newchamado',
			'controller' => 'indexController',
			'action' => 'newchamado'
		);

		$routes['consult_chamado'] = array(
			'route' => '/consult_chamado',
			'controller' => 'indexController',
			'action' => 'consult_chamado'
		);

		$routes['adduser'] = array(
			'route' => '/adduser',
			'controller' => 'indexController',
			'action' => 'adduser'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);



		$this->setRoutes($routes);
	}

}

?>