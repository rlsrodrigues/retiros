<?php 
class Retiros extends CI_controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('integrantes');
	}

	public function index() 
	{

		$seoParams = array(
			'title' 		=> 'Retiros', 
			'description' 	=> 'Página de gerenciamento de todos os retiros',
			'keywords' 		=> ''
			);

		$this->load->library('Seo', $seoParams);

		$this->load->view('includes/header', $this->seo->getSeoData());
		$this->load->view('retiros_index');
		$this->load->view('includes/footer');

	}

}