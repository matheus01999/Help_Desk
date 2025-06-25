<?php

namespace App\Models;

use App\DB\Database;
use MF\Model\Model;
use \PDO;

class Chamado extends Model
{

	private $id;
	private $id_usuario;
	private $titulo;
	private $categoria;
	private $descricao;

	public function __get($atributo)
	{
		return $this->$atributo;
	}

	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}



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

	public function excluir()
	{
		$query = 'delete from chamados where id = :id';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->execute();
	}

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

	//Testando uma querrryBuilder

	public function salvar()
	{
		$obdata = new Database('chamados');
		$this->id = $obdata->insert([
			'id_usuario' => $this->id_usuario,
			'titulo' => $this->titulo,
			'categoria' => $this->categoria,
			'descricao' => $this->descricao,
		]);

		return true;

	}


	public static function getChamados($where = null, $order =null, $limit = null){
		return(new Database('chamados'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getChamado($id){
		return(new Database('chamados'))->select('id = '.$id)->fetchAll(PDO::FETCH_ASSOC);

	}


}
