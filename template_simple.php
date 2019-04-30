<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?= $t ?></title>
	</head>
	
	<header>
		<div id="titre_principal">
			<div id="logo">
				<h1><a href="<?= URL ?>">Jean Forteroche</a></h1>
			</div>
				<h2>Ecrivain et rêveur</h2>
		</div>

		<nav>
			<ul>
				<li><a href="Home">Accueil</a></li>
				<li><a href="List">Billet Simple pour l'Alaska</a></li>
				<li><a href="About">La vie c'est comme un livre</a></li>
				<li><a href="Contact">Des idées ? Contactez-moi !</a></li>
			</ul>
		</nav>
	</header>
	<hr />
	<span style="color:red">Ici on récupère le contenu des fichiers view correspondant à l'action demandée</span>
	<?= $content ?>

	<hr />
	<span style="color:red">Pour une meilleure vision du site j'indique ici que commence le footer</span>
	<footer>

	<div id="connexion">
		<span>Mon coin privé</span>
			<p><a href="Login">Connexion</a></p>
	</div>

	<div id="copyright">
		<span>Copyright</span>
		<p>Jean Forteroche</p>
	</div>
	
	</footer>

</html>