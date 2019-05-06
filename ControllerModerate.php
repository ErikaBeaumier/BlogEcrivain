<?php

require_once('views/View.php');

class ControllerModerate
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
			//Display the chapter
		    $this->displayComments();
		}
	}

	private function displayComments()
	{
		$comments = $this->_chapterManager->getModerate();

		$this->_view = new View('Moderate');
		$this->_view->generate(array('comments' => $comments));
	}
}

?>