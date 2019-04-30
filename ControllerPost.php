<?php

require_once('views/View.php');

class ControllerPost
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
						//Test if need to insert comments
						$error = '';
						$content = '';
						$author = '';
						$f_author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
						$f_content = filter_input(INPUT_POST, 'mytextarea', FILTER_SANITIZE_SPECIAL_CHARS);
						if(isset($_POST["mytextarea"]) && isset($_POST["author"]))
						{

							if(strlen($f_content) > 200)
							{
								$error .= 'Votre texte fait plus de 200 caractères.<br/>';
							}
							if(strlen($f_author) > 54)
							{
								$error .= "Votre nom d'auteur fait plus de 54 caractères.<br/>";
							}

							if(strlen($f_content) == 0)
							{
								$error .= 'Votre texte est vide<br/>';
							}
							if(strlen($f_author) == 0)
							{
								$error .= "Votre nom d'auteur est vide<br/>";
							}

							if(strlen($error)<1){
								$this->addComments($postId, $f_author, $f_content);
							}
							else
							{
								$content = $f_content;
								$author = $f_author;
							}			
							
						}
						
						//Display the chapter
					    $this->displayChapter($postId, $content, $author, $error);
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

	private function addComments($post_id, $author, $comment)
	{
		$this->_chapterManager->insertComments($post_id, $author, $comment);
	}

	private function displayChapter($postId, $commentText, $commentAuthor, $error)
	{
		
		$chapters = $this->_chapterManager->getOneChap($postId);
		$comments = $this->_chapterManager->getComments($postId);

		$this->_view = new View('Post');
		$this->_view->generate(array('chapters' => $chapters, 'comments' => $comments, 'commentText' =>$commentText, 'commentAuthor' => $commentAuthor, 'error' => $error));
	}
}

?>