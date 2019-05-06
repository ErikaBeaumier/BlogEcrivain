<?php
require 'models/Model.php';
require 'models/Signal.php';

if(isset($_POST['UndoSignalComment']))
{
	$signal = new Signal();
	$signal->undo_signal_comment($_POST['UndoSignalComment']);
}
header('Location:'.$_POST['UndoSignalComment_source']);
?>