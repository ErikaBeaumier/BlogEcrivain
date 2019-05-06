<?php

require_once('views/View.php');

class ControllerLogout
{
	private $_view;

	public function __construct($url)
	{
		if(isset($url) && count($url) >1)
			throw new Exception('Page introuvable');
		else
			return $this->disconnect();
	}

	private function disconnect()
	{
		if(isset($_POST["disconnected"]))
		{
			unset($_SESSION['BO']);
			unset($_SESSION['user']);
			header('Location: ../Home');
		}

		$this->_view = new View('Logout');
		$this->_view->generate(array(
			"content" => ""));
	}
}

?>