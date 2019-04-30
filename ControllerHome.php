<?php

require_once('views/View.php');

class ControllerHome
{
	private $_chapterManager;
	private $_view;

	public function __construct($url)
	{
		if(isset($url) && count($url) >1)
			throw new Exception('Page introuvable');
		else
			$this->lastChapter();
	}

	private function lastChapter()
	{
		$this->_chapterManager = new ChapterManager;
		$chapters = $this->_chapterManager->getLastChap();
		$this->_view = new View('Home');
		$this->_view->generate(array('chapters' => $chapters));
	}
}

?>