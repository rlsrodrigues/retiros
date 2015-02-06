<?php 

class Integrantes extends CI_Model {

	private $table;

	function __construct(){

		parent::__construct();
		$this->table = 'retiros';

	}

}