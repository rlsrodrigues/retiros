<?php 
class Retiros extends CI_controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('retiros_model');

	}

	public function index($msg="") 
	{

		//mensagens de erro e validação de formulário
		if ($msg == 'success')		
			$messages['msgSuccess'] = 'Retiro <strong> ' . $this->input->post('nome', true) . '</strong> criado com sucesso, agora você precisa criar as equipes';

		if ($msg == 'false')
			$messages['msgError'] = 'Houve um erro ao criar o retiro <strong> ' . $this->input->post('nome', true) . '</strong>!';

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('data_inicio', 'Início', 'required');
		$this->form_validation->set_rules('data_fim', 'Fim', 'required');

		$messages['validationError'] = 0;
		if ($this->input->post('nome') && $this->form_validation->run() == FALSE) {
			$messages['validationError'] = 1;

		}

		// Parâmetros de SEO da página
		$seoParams = array(
			'title' 		=> 'Retiros', 
			'description' 	=> 'Página de gerenciamento de retiros',
			'keywords' 		=> ''
			);
		
		$this->load->library('Seo', $seoParams);

		//criando formulário de inserção
		$this->load->helper('form');
		$inputNome 			= array( 'name' => 'nome', 'id' => 'nome', 'class' => 'form-control input-text input-nome', 'placeholder' => 'Nome do retiro');
		$inputTema 			= array( 'name' => 'tema', 'id' => 'tema', 'class' => 'form-control input-text input-tema', 'placeholder' => 'Tema');
		$inputMusica 		= array( 'name' => 'musica', 'id' => 'musica', 'class' => 'form-control input-text input-musica', 'placeholder' => 'Música');
		$inputDataInicio 	= array( 'name' => 'data_inicio', 'id' => 'dataInicio', 'class' => 'form-control input-text input-data-inicio', 'placeholder' => '00-00-0000');
		$inputDataFim 		= array( 'name' => 'data_fim', 'id' => 'dataFim', 'class' => 'form-control input-text input-data-fim', 'placeholder' => '00-00-0000');
		$inputLocal 		= array( 'name' => 'local', 'id' => 'local', 'class' => 'form-control input-text input-local', 'placeholder' => 'Ex: Casa de retiro tal...');
		$inputEndereco 		= array( 'name' => 'endereco', 'id' => 'endereco', 'class' => 'form-control input-text input-endereco', 'placeholder' => 'Endereço completo: rua, numero');
		$inputObservacoes 	= array( 'name' => 'observacoes', 'id' => 'observacoes', 'class' => 'form-control input-text input-observacoes', 'placeholder' => 'Complemento de endereço, informações de referência e etc.');

		$page['inputNome'] 			= $inputNome;
		$page['inputTema'] 			= $inputTema;
		$page['inputMusica']		= $inputMusica;
		$page['inputDataInicio'] 	= $inputDataInicio;
		$page['inputDataFim'] 		= $inputDataFim;
		$page['inputLocal'] 		= $inputLocal;
		$page['inputEndereco'] 		= $inputEndereco;
		$page['inputObservacoes'] 	= $inputObservacoes;
		$page['titleForm'] 			= 'Novo Retiro';


		//regras de cadastro e inserção de dados no banco
		if($this->input->post('nome')) {

			$data = array(
			'nome'			=> $this->input->post('nome', TRUE),
		    'tema' 			=> $this->input->post('tema', TRUE),
		    'musica' 		=> $this->input->post('musica', TRUE),
		    'data_inicio' 	=> date('Y-m-d', strtotime($this->input->post('data_inicio', TRUE))),
		    'data_fim' 		=> date('Y-m-d', strtotime($this->input->post('data_fim', TRUE))),
		    'local' 		=> $this->input->post('local', TRUE),
		    'endereco'		=> $this->input->post('endereco', TRUE),
		    'observacoes' 	=> $this->input->post('observacoes', TRUE),
		    'criacao'		=> date('Y-m-d H:i:s'),
		    'status'		=> 1
			);


			if ( $this->retiros_model->cadastro($data)) {
				redirect(base_url() . 'retiros/index/success', 'refresh');
			} else {
				redirect(base_url() . 'retiros/index/false', 'refresh');
			}

		}
		
		//definição de dados e informações da página
		$pageInfo['titlePage'] 	= 'Gerenciar Retiros';
		$pageInfo['textPage'] 	= 'Parabéns! Você é o novo coordenador, vamos começar um novo trabalho?';

		//recuperando informaação de retiros cadastrados e ativos
		$listRetiros['retirosAtivos'] = $this->retiros_model->lista();
		$listRetiros['titleList'] ='Retiros Ativos';

		//setando views
		$this->load->view('includes/header', $this->seo->getSeoData());
		$this->load->view('includes/page_info', $pageInfo);
		$this->load->view('includes/messages', $messages);
		$this->load->view('list_retiros', $listRetiros);
		$this->load->view('form_retiros', $page);
		$this->load->view('includes/footer');

	}

	public function editar($id) 
	{
		$pageInfo['titlePage'] 	= 'Editar Retiro';
		$pageInfo['textPage'] 	= 'Parabéns! Você é o novo coordenador, vamos começar um novo trabalho?';

		//setando views
		$this->load->view('includes/header', $this->seo->getSeoData());
		$this->load->view('includes/page_info', $pageInfo);
		$this->load->view('includes/messages', $messages);
		$this->load->view('form_retiros', $page);
		$this->load->view('includes/footer');
	}

}