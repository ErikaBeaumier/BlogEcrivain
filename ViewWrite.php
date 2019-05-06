<?php
$this->_t = "Interface d'écriture";
if(strlen($error)>0){
	echo "<p>"."erreur : ".$error."</p>";
}
?>

<h1>Nouveau chapitre</h1>

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ipigwvzb8ent492kijvp207d3ex4m0qfdowc1dgjz58cvvqk"></script>

<script>tinymce.init({ selector:'textarea' });</script>
	
	<p>
		<form method="post">
    	<label for = "title">Titre</label><br />
    	<input type="text" id="title" name="title" value="<?= $title ?>" /><br />
 		<br /><label for = "mytextarea">Contenu</label><br />
 		<textarea id="mytextarea" name="mytextarea"><?= $content ?></textarea><br />
 		<label for = "author">Auteur(s)</label>
 		<input type="text" id="author" name="author" value="<?= $author ?>"/><br />
      	<br /><button type="submit">Envoyer</button><br />
  		</form>
  	</p>

  	