<?php

namespace MF\Model;

use App\Connection;

class Container {

	// METODO RESPONSAVEL POR RETORNAR UMA INSTÂNCIA DE MODELO
	public static function getModel($model) {
		$class = "\\App\\Models\\".ucfirst($model);
		$conn = Connection::getDb();

		return new $class($conn);
	}

	
}


?>