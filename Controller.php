<?php

Class Controller{

	public function render ($view)
	{
		ob_start();//cache

		require 'views/'.$view.'.php';

		$page_content = ob_get_clean();

		require 'views/template.php';
	}
}