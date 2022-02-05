<?php
include 'ressources/views/header.tpl.php'; ?>
<a href="index.php?action=blogPostCreate" class="btn btn-primary">Créer votre article</a><br>
<?php
if (!empty($lastArticles)) :?>
    <div class="container">
        <div class="row justify-content-evenly">
            <?php foreach ($lastArticles as $value): ?>
                <div class="card col-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value["Title"] ?></h5>
                        <h6 class="card-subtitle text-muted"><?= $value["Pseudo"] ?></h6>
                        <p class="card-text"><?= $value["Cont"] ?></p>
                        <a href="index.php?action=blogPost&id=<?= $value['ID'] ?>">Voir plus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else : ?>
    <h1>Il n'y a pas de post</h1>
<?php endif; ?>
<?php
include 'ressources/views/footer.tpl.php';
?>
