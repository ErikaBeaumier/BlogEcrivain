<?php

require_once('views/View.php');

class Router{
	private $_controller;
	private $_view;

	public function routeReq()
	{
		try
		{
			
			//Automatic loading of class
			spl_autoload_register(function($class){
				require_once('models/'.$class.'.php');
			});

			$url = '';

				//Controller is included according to the action of the user
			if(isset($_GET['url']))
			{
				$url = explode('-', filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL));

				$controller = ucfirst(strtolower($url[0]));
				$controllerClass = "Controller".$controller;
				$controllerFile = "controllers/".$controllerClass.".php";

				if(file_exists($controllerFile))
				{
					require_once($controllerFile);
					$this->_controller = new $controllerClass($url);
				}
				else
					throw new Exception('page introuvable');
			}

			else
			{
				require_once('controllers/ControllerHome.php');
				$this->_controller = new ControllerHome(['Home']);
			}
		}
		//Errors management
		catch(Exception $e)
		{
			$errorMsg = $e->getMessage();
			$this->_view = new View('Error');
			$this->_view->generate(array('errorMsg' => $errorMsg));
		}
	}
}
?>