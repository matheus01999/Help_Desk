<?php

namespace App\Models;

use MF\Database\Database;

class Chamado {

	// IDENTIFICADO UNICO DO CHAMADO
	private $id;

	// ID DO USUARIO QUE CRIOU UM NOCO CHAMADO
	private $id_usuario;

	// TICKET DO CHAMADO
	private $ticket;

	// CATEGORIA DO CHAMADO
	private $categoria;

	// DESCRIÇÃO DO CHAMADO
	private $descricao;

	protected $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

	// METODO MAGICO PARA RECUPERAR O VALOR DAS VARIAVEIS
	public function __get($atributo)
	{
		return $this->$atributo;
	}

	// METODO MAGICO QUE SETA UM VALOR NAS VARIAVEIS
	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}


	// METODO RESPONSAVEL POR LISTAR OS REGISTRO DE CHAMADOS
	public function listar()
	{
		$query = "select c.id, c.id_usuario, u.nome, c.ticket, c.categoria, c.descricao 
					from 
					chamados as c
					left join usuarios as u on (c.id_usuario = u.id)";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// METODO RESPONSAVEL POR RECUPERAR OS CHAMADO DO BANCO DE DADOS
	public static function getChamados($where = null, $order = null, $limit = null){
		return (new Database)->select($where,$order,$limit)->fetchAll(\PDO::FETCH_CLASS, self::class);
	}


	// METODO RESPONSAVEL POR EXCLUIR UM REGISTRO DO BANCO
	public function excluir()
	{
		$query = 'delete from chamados where id = :id';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->execute();
	}

	// METODO RESPONSAVEL POR ATUALIZAR UM REGISTRO NO BANCO
	public function editar()
	{
		$query = "update chamados set ticket = :ticket, categoria = :categoria, descricao = :descricao where id = :id ";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->bindValue(':ticket', $this->__get('ticket'));
		$stmt->bindValue(':categoria', $this->__get('categoria'));
		$stmt->bindValue(':descricao', $this->__get('descricao'));
		$stmt->execute();
	}


	// METODO RESPONSAVEL POR SALVAR UM REGISTRO NO BANCO
	public function salvar()
	{
		// INSTÂNCIA DO PDO 
		$obdata = new Database('chamados');

		// SALVANDO O CHAMADO NO NACO
		$this->id = $obdata->insert([
			'id_usuario' => $this->id_usuario,
			'ticket' => $this->ticket,
			'categoria' => $this->categoria,
			'descricao' => $this->descricao,
		]);

		return true;

	}
	



}
