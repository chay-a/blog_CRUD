<form method="post" action="http://blog.local/index.php?action=blogPostCreate">
    <div>
        <label for="title">Titre</label>
    </div>
    <input type="text" name="title" id="title" <?php if (isset($submit)):?>value="<?= $inputsValidate['title']?>" <?php endif;?>>
    <?php if (empty($inputsSanitized['title']) || $inputsSanitized['title'] === false) :?>
        <p><?= $msgError['title'] ?></p>
    <?php endif; ?>
    <div>
        <label for="content">Contenu</label>
    </div>
    <textarea name="content" id="content" cols="20" rows="5"><?php if (isset($submit)): echo $inputsValidate['content']; endif;?></textarea>
    <?php if (empty($inputsSanitized['content']) || $inputsSanitized['content'] === false) :?>
        <p><?= $msgError['content'] ?></p>
    <?php endif; ?>
    <div>
        <label for="startDate">Date de publication</label>
    </div>
    <input type="datetime-local" name="startDate" id="startDate" <?php if (isset($submit)):?>value="<?= $inputsValidate['startDate']?>"<?php endif;?>>
    <?php if (empty($inputsSanitized['startDate']) || $inputsSanitized['startDate'] === false) :?>
        <p><?= $msgError['startDate'] ?></p>
    <?php endif; ?>
    <div>
        <label for="endDate">Date de fin de publication</label>
    </div>
    <input type="datetime-local" name="endDate" id="endDate" <?php if (isset($submit)):?>value="<?= $inputsValidate['endDate']?>"<?php endif;?>>
    <?php if (empty($inputsSanitized['endDate']) || $inputsSanitized['endDate'] === false) :?>
        <p><?= $msgError['endDate'] ?></p>
    <?php endif; ?>
    <div>
        <label for="rank">Importance</label>
    </div>
    <input type="number" id="rank" name="rank" min="1" max="5" <?php if (isset($submit)):?>value="<?= $inputsValidate['rank']?>"<?php endif;?>>
    <?php if (empty($inputsSanitized['rank']) || $inputsSanitized['rank'] === false) :?>
        <p><?= $msgError['rank'] ?></p>
    <?php endif; ?>
    <div>
        <label for="author">Auteur</label>
    </div>
    <input type="text" name="author" id="author" <?php if (isset($submit)):?>value="<?= $inputsValidate['author']?>"<?php endif;?>>
    <?php if (empty($inputsSanitized['author']) || $inputsSanitized['author'] === false) :?>
        <p><?= $msgError['author'] ?></p>
    <?php endif; ?>
    <div>
        <input type="submit" id="submit" name="submit" value="créer">
    </div>
</form>