<?php

require_once('views/View.php');

class ControllerWrite
{
	private $_chapterManager;
	private $_view;

	public function __construct($url)
	{
		$this->_chapterManager = new ChapterManager();
		if(isset($url) && count($url) >1)
			throw new Exception('Page introuvable');
		else
			$this->addChapter();
	}

	private function addChapter()
	{
		$error = '';
		$content = '';
		$author = '';
		$title = '';
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
				 $this->saveChapter($_POST["title"],$_POST["mytextarea"],$_POST["author"]);		
				 header('Location: Dashboard');
			}
			else
			{
				$content = $_POST["mytextarea"];
				$author = $_POST["author"];
				$title = $_POST["title"];
			}
		}

		$this->_view = new View('Write');
		$this->_view->generate(array(
			"content" => $content,
			"author" => $author,
			"title" => $title,
			"error" => $error
		));
	}

	private function saveChapter($title, $content, $author)
	{
		$this->_chapterManager->insertChapter($title, $content, $author);
	}
}
?>