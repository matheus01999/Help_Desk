<?php

namespace App\Models;

use MF\Model\Model;
use \PDO;

class Chamado extends Model
{

	private $id;
	private $id_usuario;
	private $titulo;
	private $categoria;
	private $descricao;

	// METODO MAGICO QUE RECUPERA OS VALORES DO MODELO
	public function __get($atributo)
	{
		return $this->$atributo;
	}

	// METODO MAGICCO QUE SETA VALORES NO MODELO
	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}


    // METODO RESPONSAVEL POR RECUPERAR OS VALORES DO BANCO
	public function listar()
	{
		$query = "select c.id, c.id_usuario, u.nome, c.titulo, c.categoria, c.descricao 
					from 
					chamados as c
					left join usuarios as u on (c.id_usuario = u.id)";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// METODO RESPONSAVEL POR EXCLUIR UM REGISTRO DO BANCO 
	public function excluir()
	{
		$query = 'delete from chamados where id = :id';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->execute();
	}

	// METODO RESPONSAVEL POR EDITAR UM REGISTRO DO BANCO
	public function editar()
	{
		$query = "update chamados set titulo = :titulo, categoria = :categoria, descricao = :descricao where id = :id ";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->bindValue(':titulo', $this->__get('titulo'));
		$stmt->bindValue(':categoria', $this->__get('categoria'));
		$stmt->bindValue(':descricao', $this->__get('descricao'));
		$stmt->execute();
	}



}
