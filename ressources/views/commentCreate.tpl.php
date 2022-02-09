<?php
require 'ressources/views/header.tpl.php'
?>
<div class="container">
    <form action="index.php?action=blogPost&id=<?= $articleQuery['ID'] ?>" method="post">
        <div>
            <label for="content" class="form-label">Contenu</label>
            <textarea name="content" id="content" rows="5"
                      class="form-control"><?php if (isset($submit)): echo $inputsValidate['content']; endif; ?></textarea>
        </div>
        <div>
            <label for="author" class="form-label">Auteur</label>
            <input type="text" name="author" id="author" class="form-control"
                   <?php if (isset($submit)): ?>value="<?= $inputsValidate['author'] ?>"<?php endif; ?>>
        </div>
        <div>
            <input type="submit" id="submit" name="submit" value="créer" class="btn btn-primary">
        </div>
    </form>
</div>
