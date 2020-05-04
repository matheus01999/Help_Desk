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

		$this->setRoutes($routes);
	}

}

?>