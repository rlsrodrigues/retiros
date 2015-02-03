<?php 

class Integrantes extends CI_Model {

	private $table;

	public function __construct(){

		parent::__construct();
		$this->table = 'integrantes';
		$this->load->database();

	}

	public function cadastro($dataForm)
	{



		if($this->verificaEmailCadastrado($dataForm['email'])) {

			$data = array(
			'nome'				=> $dataForm['nome'],
		    'email' 			=> $dataForm['email'],
		    'comunidade' 		=> $dataForm['comunidade'],
		    'telefone_fixo' 	=> $dataForm['telefone_fixo'],
		    'celular' 			=> $dataForm['celular'],
		    'data_nascimento' 	=> $dataForm['data_nascimento'],
		    'primeiro_retiro' 	=> $dataForm['primeiro_retiro'],
		    'observacoes' 		=> $dataForm['observacoes']
			);

			if ($this->db->insert($this->table, $data)) {
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