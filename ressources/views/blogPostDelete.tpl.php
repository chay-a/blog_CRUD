<?php
require 'ressources/views/header.tpl.php';
?>
    <a href="/" class="link-primary">Retour à l'accueil</a>
    <h1>Voulez-vous supprimer cet Article ?</h1>
    <form action="index.php?action=blogPostDelete&id=<?= $queryId ?>" method="post">
        <input type="submit" name="submit" value="supprimer" class="btn btn-danger">
        <?php
        if (isset($submit)):?>
            <a href="/" class="btn btn-primary">Retour à la page d'accueil</a>
        <?php endif; ?>
    </form>
<?php
require 'ressources/views/footer.tpl.php';
?>