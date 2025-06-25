<?php

namespace App\Models;

use MF\Model\Model;
use App\DB\Database;
use \PDO;

class Usuario extends Model {

	private $id;
	private $nome;
	private $email;
	private $senha;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

	//salvar
		public function salvar() {
	     $obdata = new Database('usuarios');
		 $obdata->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
        ] );
		return $this;		
	}

	//validar se um cadastro pode ser feito
	public function validarCadastro() {
		$valido = true;

		if(strlen($this->__get('nome')) < 3) {
			$valido = false;
		}

		if(strlen($this->__get('email')) < 3) {
			$valido = false;
		}

		if(strlen($this->__get('senha')) < 3) {
			$valido = false;
		}


		return $valido;
	}

	//recuperar um usuário por e-mail
	public function getUsuarioPorEmail() {
		$query = "select nome, email from usuarios where email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function autenticar(){
		$query = "select id, nome, email from usuarios where email = :email and senha = :senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":email", $this->__get('email'));
		$stmt->bindValue(":senha", md5($this->__get('senha')));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);


		if($usuario['id'] != '' && $usuario['nome'] != ''){
			$this->__set('id', $usuario['id']);
			$this->__set('nome', $usuario['nome']);
		}

		return $this;
	}

	public function listar(){
		$query = "select id, nome, email from usuarios";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	public function excluir(){
		$query = 'delete from usuarios where id = :id';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->execute();
	}

		public static function getUsuarios($where = null, $order =null, $limit = null){
		return(new Database('usuarios'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getUsuario($id){
		return(new Database('usuarios'))->select('id = '.$id)->fetchAll(PDO::FETCH_ASSOC);

	}


}

?>