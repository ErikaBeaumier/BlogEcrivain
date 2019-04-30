<?php

$this->_t = "Connexion"; ?>

<h3>Vous êtes à la porte. Donnez-moi la clé</h3>

  <form method="post">
    	<label for = "login">Identifiant</label>
 		<input type="text" id="login" name="login"><br />
 		<br /><label for = "password">Mot de passe</label>
 		<input type="password" id="password" name="password"><br />
      	<br /><button type="submit">Connexion</button><br />
  	</form>
  <?php
if(isset($errors) && strlen($errors)>0)
{
	echo "<p>".$errors."</p>";
}

  ?>