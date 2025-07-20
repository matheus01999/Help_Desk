<?php

namespace App\Models;

use MF\Model\Model;
use App\Connection;
use App\DB\Database;

class Usuario extends Model {

	private $id;
	private $nome;
	private $email;
	private $senha;

	// METODO MAGICO QUE RECUPERA OS VALORES DO OBJETO
	public function __get($atributo) {
		return $this->$atributo;
	}

	// METODO MAGICO QUE SETAR OS VALORES DO OBJETO
	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
	
	// MEOTODO RESPONSAVEL POR RECUPERAR UM USUARIO POR E-MAIL
	public function getUsuarioPorEmail() {
		$query = "select nome, email from usuarios where email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// METODO RESPONSAVEL POR AUTENTICAR UM USUARIO
	public function autenticar(){
		$query = "select id, nome, email from usuarios where email = :email and senha = :senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":email", $this->__get('email'));
		$stmt->bindValue(":senha", $this->__get('senha'));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);


		if($usuario['id'] != '' && $usuario['nome'] != ''){
			$this->__set('id', $usuario['id']);
			$this->__set('nome', $usuario['nome']);
		}

		return $this;
	}

	// METODO RESPONSAVEL POR LISTAR OS USUARIOS
	public function listar(){
		$query = "select id, nome, email from usuarios";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	// METODO RESPONSAVEL POR EXCLUIR UM USUSARIOS DO BANCO
	public function excluir(){
		$query = 'delete from usuarios where id = :id';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->execute();
	}

}

?>