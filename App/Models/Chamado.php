<?php

namespace App\Models;

use MF\Model\Model;

class Chamado extends Model {

	private $id;
	private $titulo;
	private $categoria;
	private $descricao;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

	//salvar
	public function salvar() {

		$query = "insert into chamados(titulo, categoria, descricao)values(:titulo, :categoria, :descricao)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':titulo', $this->__get('titulo'));
		$stmt->bindValue(':categoria', $this->__get('categoria'));
		$stmt->bindValue(':descricao', $this->__get('descricao')); 
		$stmt->execute();

		return $this;
	}


}

?>