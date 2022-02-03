<?php
include 'ressources/views/header.tpl.php';
        if (!empty($lastArticles)) :
            foreach($lastArticles as $key => $value):?>
<h1><?= $value["Title"]?></h1>
            <p><?= $value["Cont"]?></p>
            <p><?= $value["Pseudo"]?></p>
    <?php endforeach;?>
        <?php else :?>
        <h1>Il n'y a pas de post</h1>
        <?php endif;?>
<?php
            include 'ressources/views/footer.tpl.php';
?>