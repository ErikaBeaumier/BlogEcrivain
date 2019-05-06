<?php
$this->_t = "Billet simple pour l'Alaska";
?>

<h2><?= $chapters->title() ?></h2>
<p><?= $chapters->content() ?></p>
<p><?= $chapters->author() ?></p>
<time><?= $chapters->published() ?></time>
<hr />

<h2>Les commentaires</h2>

<?php
foreach ($comments as $com): ?>

<p><?= $com->comment() ?></p>
<p><?= $com->author() ?></p>
<time><?= $com->comment_date() ?></time>
<?php 
if($com->is_signal() == FALSE)
{
?>

<p>
	<form method="post" action="post_signal.php">
	<input type="hidden" id='signalComment' name="signalComment" value="<?= $com->id() ?>" />
	<input type="hidden" id='signalComment_source' name="signalComment_source" value="<?= $_GET['url'] ?>" />
	<button type="submit">Signaler</button></form>
</p>

<?php 
}
else
{
	?>	
	<p>Commentaire signalé le <?= $com->is_signal_date() ?></p>
	<?php 
}
?>
<hr>
<?php endforeach; ?> 

<h3>Ajouter un commentaire</h3>
<?php
if(strlen($error)>0){
	echo "<p>"."erreur : ".$error."</p>";
}
?>
  <form method="post">
    	<label for = "mytextarea">Qu'en pensez-vous ?</label><br />
    	<textarea id="mytextarea" required name="mytextarea"><?= $commentText ?></textarea><br />
 		<br /><label for = "author">Auteur(s)</label>
 		<input type="text" required id="author" name="author" value="<?= $commentAuthor ?>"><br />
      	<br /><button type="submit">Envoyer</button><br />
  </form>