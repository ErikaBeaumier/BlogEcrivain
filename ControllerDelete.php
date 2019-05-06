<?php

require_once('views/View.php');

class ControllerDelete
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
					    $this->deleteChapter($postId);
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

	private function deleteChapter($postId)
	{
			 $this->_chapterManager->supprimChapter($postId);
			 header('Location: Dashboard');
	}
}

?>