<?php

require_once('views/View.php');

class ControllerDashboard
{
	private $_chapterManager;
	private $_view;

	public function __construct($url)
	{
		if(isset($url) && count($url) >1)
			throw new Exception('Page introuvable');
		else
			$this->chapters();
	}

	private function chapters()
	{
		$this->_chapterManager = new ChapterManager;
		$chapters = $this->_chapterManager->getChapters();

		$this->_view = new View('Dashboard');
		$this->_view->generate(array('chapters' => $chapters));
	}
}

?>