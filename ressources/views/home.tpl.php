<?php
include 'ressources/views/header.tpl.php'; ?>
<a href="index.php?action=blogPostCreate">Créer votre article</a><br>
<?php
if (!empty($lastArticles)) :
    foreach ($lastArticles as $value):?>
        <a href="index.php?action=blogPost&id=<?= $value['ID'] ?>"><?= $value["Title"] ?></a>
        <p><?= $value["Cont"] ?></p>
        <p><?= $value["Pseudo"] ?></p>
    <?php endforeach; ?>
<?php else : ?>
    <h1>Il n'y a pas de post</h1>
<?php endif; ?>
<?php
include 'ressources/views/footer.tpl.php';
?>