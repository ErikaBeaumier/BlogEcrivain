<?php

require_once('views/View.php');

class ControllerContact
{
	
	public function __construct($url)
	{
		if(isset($url) && count($url) >1)
			throw new Exception('Page introuvable');
		else
			$this->showForm();

	}

	private function showForm()
	{
		$this->_view = new View('Contact');
		$this->_view->generate(array('form' => new Contact([])));
	}

}

?>