<?php
require 'models/Model.php';
require 'models/Signal.php';

if(isset($_POST['signalComment']))
{
	$signal = new Signal();
	$signal->signal_comment($_POST['signalComment']);
}
header('Location:'.$_POST['signalComment_source']);
?>