<?php
class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('integrantes');
	}

	public function index()
	{

		$seoParams = array(
			'title' 		=> 'Página Inicial', 
			'description' 	=> 'Esta é página inicial do sistema de gerenciamento de retiros',
			'keywords' 		=> 'Retiros, Deus é mais, Deus é fiel'
			);
		$this->load->library('Seo', $seoParams);
		$this->load->view('includes/header', $this->seo->getSeoData());

		$page['title'] = 'Formulário de cadastro Encontro com Deus';

		$this->load->helper('form');
		$inputNome = array(
			'name'        => 'nome',
			'id'          => 'nome',
			'class'       => 'form-control input-text input-nome',
			'placeholder' => 'Nome Completo'
        );
		$inputEmail = array(
			'name'        => 'email',
			'id'          => 'email',
			'class'       => 'form-control input-text input-email',
			'placeholder' => 'E-mail'
        );
        $inputComunidade = array(
			'name'        => 'comunidade',
			'id'          => 'comunidade',
			'class'       => 'form-control input-text input-comunidade',
			'placeholder' => 'Comunidade'
        );
        $inputTelefoneFixo = array(
			'name'        => 'telefone_fixo',
			'id'          => 'telefoneFixo',
			'class'       => 'form-control input-text input-telefone-fixo',
			'placeholder' => 'Telefone Fixo'
        );
        $inputCelular = array(
			'name'        => 'celular',
			'id'          => 'celular',
			'class'       => 'form-control input-text input-celular',
			'placeholder' => 'Celular'
        );
        $inputPrimeiroRetiro = array(
			'name'        => 'primeiro_retiro',
			'id'          => 'primeiroRetiro',
			'class'       => 'form-control input-text input-celular',
			'placeholder' => 'Qual foi o seu primeiro retiro?'
        );
        $inputObservacoes = array(
			'name'        => 'observacoes',
			'id'          => 'observacoes',
			'class'       => 'form-control input-text input-celular',
			'placeholder' => 'Por ex: sou intolerante a lactose, sou hipertenso, ou algo do genêro.'
        );
        
        $page['inputNome'] = $inputNome;
        $page['inputEmail'] = $inputEmail;
        $page['inputComunidade'] = $inputComunidade;
        $page['inputTelefoneFixo'] = $inputTelefoneFixo;
        $page['inputCelular'] = $inputCelular;
        $page['inputPrimeiroRetiro'] = $inputPrimeiroRetiro;
        $page['inputObservacoes'] = $inputObservacoes;

        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('comunidade', 'Comunidade', 'required');
		$this->form_validation->set_rules('telefone_fixo', 'Telefone Residencial', 'required');
		$this->form_validation->set_rules('celular', 'Celular', 'required');
		$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required');

		$page['validationError'] = 0;



		if ($this->input->post('nome') && $this->form_validation->run() == FALSE){

			$page['validationError'] = 1;

		}

		if($this->input->post('nome')) {

			if ( $this->integrantes->cadastro($this->input->post(NULL, TRUE))) {
				$page['msgSuccess'] = '<strong> ' . $this->input->post('nome', true) . '</strong> cadastro efetuado com sucesso, muito obrigado!';
			} else {
				$page['msgError'] = '<strong> ' . $this->input->post('nome', true) . '</strong> Tudo me leva a crer que você já se cadastrou!';
			}

		}

		$this->load->view('index', $page);		

	}

	

	public function login()
	{
		
		

	}

}
