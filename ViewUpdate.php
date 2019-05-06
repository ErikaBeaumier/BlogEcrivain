<?php
$this->_t = "Interface de modification";

if(strlen($error)>0){
	echo "<p>"."erreur : ".$error."</p>";
}
?>

<h3>Edition chapitre</h3>

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ipigwvzb8ent492kijvp207d3ex4m0qfdowc1dgjz58cvvqk"></script>

<script>tinymce.init({ selector:'textarea' });</script>
	
	<p>
		<form method="post">
    	<label for = "title">Titre</label><br />
    	<input type="text" id="title" name="title" value="<?= $chapters->title() ?>" /><br />
 		<br /><label for = "mytextarea">Contenu</label><br />
 		<textarea id="mytextarea" name="mytextarea"><?= $chapters->content() ?></textarea><br />
 		<label for = "author">Auteur(s)</label>
 		<input type="text" id="author" name="author" value="<?= $chapters->author() ?>"/><br />
      	<br /><button type="submit">Envoyer</button><br />
  		</form>
  	</p>

  	