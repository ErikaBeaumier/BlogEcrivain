<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?= $t ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/custom.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<header>
			<!-- no header : just vertical nav moving to header in responsive design -->
		</header>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="Home">Accueil</a></li>
							<li><a href="List">Billet Simple pour l'Alaska</a></li>
							<li><a href="About">La vie c'est comme un livre</a></li>
							<li><a href="Contact">Des idées ? Contactez-moi</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<?= $content ?>
						</div>
					</section>					
			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li><a href="Login">Espace privé</a></li><li>Copyright : Jean Forteroche 2019</li>
							<li><a href="Home">Accueil</a></li>
							<li><a href="List">Chapitres</a></li>
							<li><a href="About">A Propos</a></li>
							<li><a href="Contact">Contact</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>