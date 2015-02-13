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

}