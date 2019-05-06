<?php

require_once('views/View.php');

class ControllerUpdate
{
	private $_chapterManager;
	private $_view;

	public function __construct($url)
	{
		$this->_chapterManager = new ChapterManager();

		if(isset($url) && count($url) >2)
			throw new Exception('Page introuvable');
		else
		{
			//test URL format
			if(isset($url[1]))
			{
				try
				{
					$postId = intval($url[1]);
					if ($postId > 0) 
					{						
						//Display the chapter
					    $this->displayChapter($postId);
					}
					else 
				  	  throw new Exception('Identifiant de chapitre inférieur à 0');
				}
				catch(Exception $e)
				{
					throw new Exception('Identifiant de chapitre mal formaté');
				}
			}
			else
				throw new Exception('Identifiant de chapitre non spécifié');
		}
	}

	private function displayChapter($postId)
	{
		$error = '';
		if(isset($_POST["title"])) 
		{
			if(strlen($_POST["mytextarea"]) > 65000)
			{
				$error .= 'Votre contenu fait plus de 65 000 caractères.<br/>';
			}

			if(strlen($_POST["title"]) > 250)
			{
				$error .= 'Votre titre fait plus de 250 caractères.<br/>';
			}
						if(strlen($_POST["author"]) > 54)
			{
				$error .= "Votre nom d'auteur fait plus de 54 caractères.<br/>";
			}

			if(strlen($error)<1){
				 $this->_chapterManager->reformChapter($postId, $_POST["title"],$_POST["mytextarea"],$_POST["author"]);
				 header('Location: Dashboard');
			}
		}

		$chapters = $this->_chapterManager->getOneChap($postId);
		if($error)
		{
			$chapters->setTitle($_POST["title"]);
			$chapters->setContent($_POST["mytextarea"]);
			$chapters->setAuthor($_POST["author"]);
		}

		$this->_view = new View('Update');
		$this->_view->generate(array('chapters' => $chapters,'error' => $error));
	}
}

?>