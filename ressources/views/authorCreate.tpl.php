<?php
require 'ressources/views/header.tpl.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <form action="index.php?action=authorCreate" method="post" class="col-3">
            <div>
                <label for="name" class="form-label">Nom d'autheur</label>
                <input type="text" name="name" id="name" class="form-control">
                <?php if (empty($inputsSanitized['name']) || $inputsValidate['name'] === false) : ?>
                    <p class="text-danger"><?= $msgError['name'] ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="firstname" class="form-label">Prénom d'auteur</label>
                <input type="text" name="firstname" id="firstname" class="form-control">
                <?php if (empty($inputsSanitized['firstname']) || $inputsValidate['firstname'] === false) : ?>
                    <p class="text-danger"><?= $msgError['firstname'] ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="pseudo" class="form-label">Pseudo d'auteur</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control">
                <?php if (empty($inputsSanitized['pseudo']) || $inputsValidate['pseudo'] === false) : ?>
                    <p class="text-danger"><?= $msgError['pseudo'] ?></p>
                <?php endif; ?>
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="créer" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<?php
require 'ressources/views/footer.tpl.php';