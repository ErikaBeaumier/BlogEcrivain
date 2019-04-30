<?php

if(!isset($_SESSION['BO']))
{
  session_start();
  $_SESSION['BO'] = "session open";
  	//already connected
	if(isset($_SESSION['user']))
		header('Location: backoffice/Dashboard');
}

?>
<?php

require_once('views/View.php');

class ControllerLogin
{
	private $_view;

	public function __construct($url)
	{
		if(isset($url) && count($url) >1)
			throw new Exception('Page introuvable');
		else
		{
			if(isset($_POST["login"]))
				$this->validateUser($_POST["login"], $_POST["password"]);
			else
				return $this->displayform();
		}
	}

	private function validateUser($login, $mdp)
	{
		$loginmanager = new LoginManager();
		if($loginmanager->testLogin($login,$mdp))
		{
			//connexion succeed
			$_SESSION['user'] = $login;
			header('Location: backoffice/Dashboard');
		}
		else
		{
			//connexion failed
			$this->_view = new View('Login');
			$this->_view->generate(array(
				"content" => "", "errors" => "Login et/ou mot de passe incorrect."));
		}
	}

	private function displayform()
	{
		$this->_view = new View('Login');
		$this->_view->generate(array(
			"content" => ""));
	}
}

?>