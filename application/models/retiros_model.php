<?php 

class Retiros_model extends CI_Model {

	private $table;

	function __construct(){

		parent::__construct();
		$this->table = 'retiros';

	}

	public function cadastra($dataForm)
	{

		if ($this->db->insert($this->table, $dataForm)) {
			return true;
		}

		return false;

	}

	public function lista()
	{
		$this->db->where('status', 1);
		$this->db->or_where('status', 2);
		$query = $this->db->get('retiros');

		return $query->result();
	}

	public function obterRetiro($id) 
	{

		$this->db->where('id', $id);
		$query = $this->db->get('retiros');

		return $query->result();

	}

	public function edita($id, $dataForm) 
	{	

		$this->db->where('id', $id);

		if ($this->db->update($this->table, $dataForm)) {
			return true;
		}

		return false;
	}

	public function deleta($id) 
	{
		$this->db->where('id', $id);

		if ($this->db->delete($this->table)) {
			return true;
		}

		return false;
	}

}