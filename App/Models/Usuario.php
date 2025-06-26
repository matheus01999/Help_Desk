<?php

namespace App\Models;
use MF\Database\Database;


class Usuario  {


	// IDENTIFICADOR UNICO DO USUARIO
	private $id;

	// NOME DO USUARIO
	private $nome;

	// E-MAIL DO USUSARIO
	private $email;

	// SENHA DO USUARIO
	private $senha;

	protected $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}


	// METODO MAGICO RESPONSAVEL POR RECUPERAR O VALOR DE UMA VARIAVEL
	public function __get($atributo) {
		return $this->$atributo;
	}

	// METODO RESPONSAVEL POR SETAR O VALOR DE UMA VARIAVEL
	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

	// METODO RESPONSAVEL POR SALVAR UM REGISTRO NO BANCO 
		public function salvar() {
	     $obdata = new Database('usuarios'); // INSTÂNCIA DA CLASSE DATABASE COM O QUERRY BUILDER INSERT
		 $obdata->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
        ] );
		return $this;		
	}

	// METODO RESPONSAVEL POR VALIDAR O CADASTRO DO USUARIO
	// ELABORAR**


	// METODO RESPONSAVEL POR RECUPERAR O E-MAIL DE U  USUARIO 
	public function getUsuarioPorEmail() {
		$query = "select nome, email from usuarios where email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// METODO RESPONSAVEL PELA AUTENTICAÇÃO DO LOGIN
	public function autenticar(){
		$query = "select id, nome, email from usuarios where email = :email and senha = :senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":email", $this->__get('email'));
		$stmt->bindValue(":senha", md5($this->__get('senha')));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

		// VALIDAÇÃO SE ID E NOME DE USUARIO RETORNARAM VAZIOS
		if($usuario['id'] != '' && $usuario['nome'] != ''){
			$this->__set('id', $usuario['id']);
			$this->__set('nome', $usuario['nome']);
		}

		return $this;
	}

	// METODO RESPONSAVEL POR RECUPERAR OS USUARIOS CADASTRADOS NO BANCO
	public function listar(){
		$query = "select id, nome, email from usuarios";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	// METODO RESPONSAVEL POR EXCLUIR UM REGISTRO DO BANCO
	public function excluir(){
		$query = 'delete from usuarios where id = :id';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->execute();
	}




}

?>