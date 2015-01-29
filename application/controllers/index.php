<?php
class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		//config SEO
		$seoParams = array(
			'title' 		=> 'Página Inicial', 
			'description' 	=> 'Esta é página inicial do sistema de gerenciamento de retiros',
			'keywords' 		=> 'Retiros, Deus é mais, Deus é fiel'
			);

		$this->load->library('Seo', $seoParams);

		$this->load->view('includes/header', $this->seo->getSeoData());

		//config Page
		$page['title'] = 'Formulário de cadastro Encontro com Deus';

		$inputNome = array(
			'name'        => 'nome',
			'id'          => 'nome',
			'class'       => 'input-text input-nome'
        );
		$inputEmail = array(
			'name'        => 'email',
			'id'          => 'email',
			'class'       => 'input-text input-email'
        );
        $inputComunidade = array(
			'name'        => 'comunidade',
			'id'          => 'comunidade',
			'class'       => 'input-text input-comunidade'
        );
        $inputTelefoneFixo = array(
			'name'        => 'telefone_fixo',
			'id'          => 'telefoneFixo',
			'class'       => 'input-text input-telefone-fixo'
        );
        $inputCelular = array(
			'name'        => 'celular',
			'id'          => 'celular',
			'class'       => 'input-text input-celular'
        );
        $inputDataNascimento = array(
			'name'        => 'data_nascimento',
			'id'          => 'dataNascimento',
			'class'       => 'input-text input-data-nascimento'
        );

        $page['inputNome'] = $inputNome;
        $page['inputEmail'] = $inputEmail;
        $page['inputComunidade'] = $inputComunidade;
        $page['inputTelefoneFixo'] = $inputTelefoneFixo;
        $page['inputCelular'] = $inputCelular;
        $page['inputDataNascimento'] = $inputDataNascimento;

		$this->load->view('index', $page);

	}

	public function cadastro()
	{
		
		$this->load->database();

		$data = array(
			'nome'				=> $_POST['nome'],
		    'email' 			=> $_POST['email'],
		    'comunidade' 		=> $_POST['comunidade'],
		    'telefone_fixo' 	=> $_POST['telefone_fixo'],
		    'celular' 			=> $_POST['celular'],
		    'data_nascimento' 	=> $_POST['data_nascimento']
			);

		if ($this->db->insert('integrantes', $data)) {
			echo 'incluiusaporra';
		}
	}

}
