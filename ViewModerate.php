<?php
$this->_t = "Modération des commentaires";
?>

<h1>Les commentaires signalés</h1>

<?php
foreach ($comments as $com): ?>

<p><?= $com->comment() ?></p>
<p><?= $com->author() ?></p>
<time><?= $com->comment_date() ?></time>

<p>
	<form method="post" action="post_DeleteSignal.php">
	<input type="hidden" id='signalComment' name="signalComment" value="<?= $com->id() ?>" />
	<input type="hidden" id='signalComment_source' name="signalComment_source" value="<?= $_GET['url'] ?>" />
	<button type="submit" onclick="return confirm('Etes vous sûrs ?')">Supprimer</button></form>
	&nbsp;
	<form method="post" action="post_UndoSignal.php">
	<input type="hidden" id='UndoSignalComment' name="UndoSignalComment" value="<?= $com->id() ?>" />
	<input type="hidden" id='UndoSignalComment_source' name="UndoSignalComment_source" value="<?= $_GET['url'] ?>" />
	<button type="submit" onclick="return confirm('Etes vous sûrs ?')">Annuler signalement</button></form>
</p>

<?php endforeach; ?>