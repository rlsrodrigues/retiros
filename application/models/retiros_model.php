<?php 

class Retiros_model extends CI_Model {

	private $table;

	function __construct(){

		parent::__construct();
		$this->table = 'retiros';

	}

	public function cadastro($dataForm)
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

}