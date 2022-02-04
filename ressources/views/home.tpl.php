<?php
include 'ressources/views/header.tpl.php';
        if (!empty($lastArticles)) :
            foreach($lastArticles as $article):?>
            <h1><?= $article["Title"]?></h1>
            <p><?= $article["Cont"]?></p>
            <p><?= $article["Pseudo"]?></p>
    <?php endforeach;?>
        <?php else :?>
        <h1>Il n'y a pas de post</h1>
        <?php endif;?>
<?php
            include 'ressources/views/footer.tpl.php';
?>
