<?php

$this->_t = "Billet simple pour l'Alaska"; ?>

<h1>Découvrez le roman dans son intégralité</h1>

<?php foreach ($chapters as $article): ?>
<h3><input type="button" onclick="location.href='Post-<?= $article->id() ?>';" value="<?= $article->title() ?>" /></h3>
<p><?= $article->content() ?>&nbsp;<a href='Post-<?= $article->id() ?>'>Lire la suite</a></p>
<p><?= $article->author() ?> &nbsp;publié le : <time><?= $article->published() ?></time></p>


<?php endforeach; ?>