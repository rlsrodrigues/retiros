<?php 

class Integrantes extends CI_Model {

	private $table;

	function __construct(){

		parent::__construct();
		$this->table = 'integrantes';

	}

	public function cadastro($dataForm)
	{

		if($this->verificaEmailCadastrado($dataForm['email'])) {

			if ($this->db->insert($this->table, $dataForm)) {
				return true;
			}

		}

		return false;

	}

	private function verificaEmailCadastrado($email) {
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('email', $email);

		$cadastroExistente = $this->db->get();

		if($cadastroExistente->num_rows() > 0)
			return false;

		return true;


	}

}