<?php

$this->_t = 'Blog de Jean Forteroche'; ?>

<h1>Bienvenue sur le blog de Jean Forteroche</h1>
<h2>Découvrez le dernier chapitre publié</h2>

<?php foreach ($chapters as $article): ?>

<h2><a href='Post-<?= $article->id() ?>'><?= $article->title() ?></a></h2>
<p><?= $article->content() ?></p>
<p><?= $article->author() ?></p>
<time><?= $article->published() ?></time>

<?php endforeach; ?>