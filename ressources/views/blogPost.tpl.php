<?php
include 'ressources/views/header.tpl.php'; ?>
<a href="index.php?action=blogPostModify&id=<?= $articleQuery['ID']?>">Modifier l'article</a>
<a href="index.php?action=blogPostDelete&id=<?= $articleQuery['ID']?>">Supprimer l'article</a>
<h1><?= $articleQuery['Title'] ?></h1>
<p><?= $articleQuery['Cont']?></p>
<p><?= $articleQuery['Pseudo']?></p>
<?php foreach ($articleCommentsQuery as $value):?>
<blockquote><?= $value['Cont']?></blockquote>
<p><?= $value['Pseudo']?></p>
<?php endforeach; ?>
<?php
include 'ressources/views/footer.tpl.php';
?>