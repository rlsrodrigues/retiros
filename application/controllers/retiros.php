<?php 
class Retiros extends CI_controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('retiros_model');
		$this->load->helper('form');

	}

	public function index($msg="")
	{

		//mensagens de erro e validação de formulário
		if ($msg == 'success')		
			$messages['msgSuccess'] = 'Retiro <strong> ' . $this->input->post('nome', true) . '</strong> criado com sucesso, agora você precisa criar as equipes';

		if ($msg == 'false')
			$messages['msgError'] = 'Houve um erro ao criar o retiro <strong> ' . $this->input->post('nome', true) . '</strong>!';

		// Parâmetros de SEO da página
		$seoParams = array(
			'title' 		=> 'Retiros', 
			'description' 	=> 'Página de gerenciamento de retiros',
			'keywords' 		=> ''
			);
		
		$this->load->library('Seo', $seoParams);

		//definição de dados e informações da página
		$pageInfo['titlePage'] 	= 'Gerenciar Retiros';
		$pageInfo['textPage'] 	= 'Parabéns! Você é o novo coordenador, vamos começar um novo trabalho?';

		//recuperando informaação de retiros cadastrados e ativos
		$listRetiros['retirosAtivos'] = $this->retiros_model->obterRetiros();
		$listRetiros['titleList'] ='Retiros Ativos';

		if ( count($listRetiros['retirosAtivos']) == 0) {

			$resultsError['message'] = 'Ainda não temos retiro cadastrado.';
			$resultsError['addButton'] = true;
			$resultsError['addButtonLink'] = base_url() . 'retiros/incluir';

		}

		//setando views
		$this->load->view('includes/header', $this->seo->getSeoData());
		if(isset($messages)){
			$this->load->view('includes/page_info', $pageInfo);
			$this->load->view('includes/messages', $messages);
		}
		if (isset($resultsError) && $resultsError != ''){
			$this->load->view('no_results', $resultsError);
		} else {
			$this->load->view('list_retiros', $listRetiros);
		}
		$this->load->view('includes/footer');

	}

	public function incluir($msg="") 
	{

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
			'title' 		=> 'Incluir Retiro', 
			'description' 	=> 'Página de gerenciamento de retiros',
			'keywords' 		=> ''
			);
		
		$this->load->library('Seo', $seoParams);

		//definição de dados e informações da página
		$pageInfo['titlePage'] 	= 'Incluir Retiro';
		$pageInfo['textPage'] 	= 'Preencha os campos abaixo e clique em "Salvar"';

		//criando formulário de inserção
		$inputNome 			= array( 'name' => 'nome', 'id' => 'nome', 'class' => 'form-control input-text input-nome', 'placeholder' => 'Nome do retiro');
		$inputTema 			= array( 'name' => 'tema', 'id' => 'tema', 'class' => 'form-control input-text input-tema', 'placeholder' => 'Tema');
		$inputMusica 		= array( 'name' => 'musica', 'id' => 'musica', 'class' => 'form-control input-text input-musica', 'placeholder' => 'Música');
		$inputDataInicio 	= array( 'name' => 'data_inicio', 'id' => 'dataInicio', 'class' => 'form-control input-text input-data-inicio', 'placeholder' => '00-00-0000');
		$inputDataFim 		= array( 'name' => 'data_fim', 'id' => 'dataFim', 'class' => 'form-control input-text input-data-fim', 'placeholder' => '00-00-0000');
		$inputLocal 		= array( 'name' => 'local', 'id' => 'local', 'class' => 'form-control input-text input-local', 'placeholder' => 'Ex: Casa de retiro tal...');
		$inputEndereco 		= array( 'name' => 'endereco', 'id' => 'endereco', 'class' => 'form-control input-text input-endereco', 'placeholder' => 'Endereço completo: rua, numero');
		$inputObservacoes 	= array( 'name' => 'observacoes', 'id' => 'observacoes', 'class' => 'form-control input-text input-observacoes', 'placeholder' => 'Complemento de endereço, informações de referência e etc.');

		$page['action'] 			= 'index';
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


			if ( $this->retiros_model->cadastra($data)) {
				redirect(base_url() . 'retiros/index/success', 'refresh');
			} else {
				redirect(base_url() . 'retiros/index/false', 'refresh');
			}

		}
		

		//setando views
		$this->load->view('includes/header', $this->seo->getSeoData());
		$this->load->view('includes/page_info', $pageInfo);
		$this->load->view('includes/messages', $messages);
		$this->load->view('form_retiros', $page);
		$this->load->view('includes/footer');

	}

	public function editar($id="") 
	{
		// Parâmetros de SEO da página
		$seoParams = array(
			'title' 		=> 'Editar retiro', 
			'description' 	=> 'Preencha o formulário e edite os dados do Retiro.',
			'keywords' 		=> ''
			);
		$this->load->library('Seo', $seoParams);

		// informações da página
		$pageInfo['titlePage'] 	= 'Editar Retiro';
		$pageInfo['textPage'] 	= 'Preencha os dados que deseja alterar!';

		//regras de cadastro e update de dados no banco
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
			);

			if ( $this->retiros_model->edita($this->input->post('id', TRUE), $data)) {
				redirect(base_url() . 'retiros/index/success', 'refresh');
			} else {
				redirect(base_url() . 'retiros/index/false', 'refresh');
			}

		}

		$resultsError = '';

		//Recuperando dados do retiro
		$retiro = $this->retiros_model->obterRetiro($id);

		if ( $retiro ) {

			//criando formulário de inserção
			$inputNome 			= array( 'name' => 'nome', 'id' => 'nome', 'class' => 'form-control input-text input-nome', 'placeholder' => 'Nome do retiro', 'value' => $retiro[0]->nome);
			$inputTema 			= array( 'name' => 'tema', 'id' => 'tema', 'class' => 'form-control input-text input-tema', 'placeholder' => 'Tema', 'value' => $retiro[0]->tema);
			$inputMusica 		= array( 'name' => 'musica', 'id' => 'musica', 'class' => 'form-control input-text input-musica', 'placeholder' => 'Música', 'value' => $retiro[0]->musica);
			$inputDataInicio 	= array( 'name' => 'data_inicio', 'id' => 'dataInicio', 'class' => 'form-control input-text input-data-inicio', 'placeholder' => '00-00-0000','value' => date('d-m-Y', strtotime($retiro[0]->data_inicio)));
			$inputDataFim 		= array( 'name' => 'data_fim', 'id' => 'dataFim', 'class' => 'form-control input-text input-data-fim', 'placeholder' => '00-00-0000', 'value' => date('d-m-Y', strtotime($retiro[0]->data_fim)));
			$inputLocal 		= array( 'name' => 'local', 'id' => 'local', 'class' => 'form-control input-text input-local', 'placeholder' => 'Ex: Casa de retiro tal...', 'value' => $retiro[0]->local);
			$inputEndereco 		= array( 'name' => 'endereco', 'id' => 'endereco', 'class' => 'form-control input-text input-endereco', 'placeholder' => 'Endereço completo: rua, numero', 'value' => $retiro[0]->endereco);
			$inputObservacoes 	= array( 'name' => 'observacoes', 'id' => 'observacoes', 'class' => 'form-control input-text input-observacoes', 'placeholder' => 'Complemento de endereço, informações de referência e etc.', 'value' => $retiro[0]->observacoes);

			$page['action'] 			= 'editar';
			$page['inputNome'] 			= $inputNome;
			$page['inputTema'] 			= $inputTema;
			$page['inputMusica']		= $inputMusica;
			$page['inputDataInicio'] 	= $inputDataInicio;
			$page['inputDataFim'] 		= $inputDataFim;
			$page['inputLocal'] 		= $inputLocal;
			$page['inputEndereco'] 		= $inputEndereco;
			$page['inputObservacoes'] 	= $inputObservacoes;
			$page['titleForm'] 			= 'Novo Retiro';
			$page['id'] 				= $id;

		} else {

			$resultsError['message'] = 'O Retiro solicitado não foi encontrado, verifique e tente novamente';
			$resultsError['backButton'] = true;
			$resultsError['backButtonLink'] = base_url() . 'retiros/';

		}

		//setando views
		$this->load->view('includes/header', $this->seo->getSeoData());
		if (empty($resultsError) && $resultsError == '') {

			$this->load->view('includes/page_info', $pageInfo);;
			$this->load->view('form_retiros', $page);

		} else {

			$this->load->view('no_results', $resultsError);

		}
		$this->load->view('includes/footer');

	}

	public function deletar()
	{
		if($this->input->post('deletar')) {

			if ( $this->retiros_model->deleta($this->input->post('id')) ) {
				redirect(base_url() . 'retiros/index/success', 'refresh');
			} else {
				redirect(base_url() . 'retiros/index/false', 'refresh');
			}

		} else {

			redirect(base_url() . 'retiros/', 'refresh');

		}

	}

}