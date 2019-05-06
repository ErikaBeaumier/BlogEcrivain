<?php

$this->_t = "Tableau de bord Jean Forteroche"; ?>

<h1>Tableau de bord</h1>

<?php foreach ($chapters[0] as $article): ?>

<h2><a href='Update-<?= $article->id() ?>'><?= $article->title() ?></a></h2>
<p><?= $article->author() ?></p>
<time><?= $article->published() ?></time>
<a href='Update-<?= $article->id() ?>' ><input type="button" value="Modifier"></a>
<a href='Delete-<?= $article->id() ?>' onclick="return confirm('Etes vous sûrs ?')"><input type="button" value="Supprimer"></a>

<?php endforeach; ?>