<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo{

	private $title;
	private $description;
	private $keywords;

	public function __construct($params) {

		if ( isset($params['title']) )
			$this->setTitle($params['title']);

		if ( isset($params['description']) )
			$this->setDescription($params['description']);

		if ( isset($params['keywords']) )
			$this->setKeyword($params['keywords']);

	}

	private function setTitle($title) 
	{

		$this->title = $title;

	}

	private function setDescription($description) 
	{

		$this->description = $description;

	}

	private function setKeyword($keywords) 
	{

		$this->keywords = $keywords;

	}

	public function getSeoData() 
	{

		$data = array(
			'title' => $this->title,
			'description' => $this->description,
			'keywords' => $this->keywords
			);

		return $data;

	}



}