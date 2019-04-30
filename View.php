<?php

class View
{
	private $_file;
	private $_t;
	private $_action;

	public function __construct($action)
	{
		$this->_action = $action;
		$this->_file = 'views/View'.$action.'.php';
	}
	
	//generates and displays the view
	public function generate($p_data)
	{

		switch($this->_action)
		{
		 // Display Home Page
		 case 'Home':
			$data = ['chapters'=> [$p_data['chapters']]];
		  break;

		 // Display Chapters List
		 case 'List':
		 	$data = $p_data;
		  break;

		  // Display One Chapter with comments
		  case 'Post':
			$data = $p_data;
		  break;

		  //Display About Page
		  case 'About':
		  	$data = "";
		  break;	

		  //Display Contact Page
		  case 'Contact':
		  	$data = $p_data;
		  break;	  	

		  // Default display
		 default :
		  $data = $p_data;
		  break;
		}
		
		//Generates file
		$content = $this->generateFile($this->_file, $data);
		$view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));

		//Affichage
		echo $view;
	}
	
	// generates a view file and returns the result
	private function generateFile($file, $data)
	{
		if(file_exists($file))
		{
			if(is_array($data))
				extract($data);

			ob_start();

			require $file;

			return ob_get_clean();
		}
		else
			throw new Exception('Fichier '.$file.' introuvable');
	}
}

?>