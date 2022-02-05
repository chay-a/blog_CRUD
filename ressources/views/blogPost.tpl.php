<?php
include 'ressources/views/header.tpl.php'; ?>
    <a href="index.php?action=blogPostModify&id=<?= $articleQuery['ID'] ?>" class="btn btn-primary">Modifier
        l'article</a>
    <a href="index.php?action=blogPostDelete&id=<?= $articleQuery['ID'] ?>" class="btn btn-danger">Supprimer
        l'article</a>
    <div class="container">
        <div class="row card text-center">
            <p class="card-header">Catégories</p>
            <div class="card-body">
                <h1 class="card-title"><?= $articleQuery['Title'] ?></h1>
                <p class="card-text"><?= $articleQuery['Cont'] ?></p>
                <h6 class="card-subtitle text-muted"><?= $articleQuery['Pseudo'] ?></h6>
            </div>
            <div class="card-footer text-muted"><p>1 days ago</p></div>
        </div>
    </div>
<div class="container">
    <?php foreach ($articleCommentsQuery as $value): ?>
    <div class="row card">
        <p class="card-header">Date</p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote">
            <p><?= $value['Cont'] ?></p>
            <footer class="blockquote-footer"><?= $value['Pseudo'] ?></footer>
        </blockquote>
    </div>
    <?php endforeach; ?>
</div>
<?php
include 'ressources/views/footer.tpl.php';
?>