<?php
include 'ressources/views/header.tpl.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <form method="post" action="http://blog.local/index.php?action=blogPostCreate" class="col-3">
                <div>
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" class="form-control"
                           <?php if (isset($submit)): ?>value="<?= $articleDatas['Title'] ?>" <?php endif; ?>>
                    <?php if (empty($inputsSanitized['title']) || $inputsSanitized['title'] === false) : ?>
                        <p class="text-danger"><?= $msgError['title'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="content" class="form-label">Contenu</label>
                    <textarea name="content" id="content" rows="5"
                              class="form-control"><?php if (isset($submit)): echo $articleDatas['Cont']; endif; ?></textarea>
                    <?php if (empty($inputsSanitized['content']) || $inputsSanitized['content'] === false) : ?>
                        <p  class="text-danger"><?= $msgError['content'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="startDate" class="form-label">Date de publication</label>
                    <input type="datetime-local" name="startDate" id="startDate" class="form-control"
                           <?php if (isset($submit)): ?>value="<?= $articleDatas['DateStart'] ?>"<?php endif; ?>>
                    <?php if (empty($inputsSanitized['startDate']) || $inputsSanitized['startDate'] === false) : ?>
                        <p class="text-danger"><?= $msgError['startDate'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="endDate" class="form-label">Date de fin de publication</label>
                    <input type="datetime-local" name="endDate" id="endDate" class="form-control"
                           <?php if (isset($submit)): ?>value="<?= $articleDatas['DateEnd'] ?>"<?php endif; ?>>
                    <?php if (empty($inputsSanitized['endDate']) || $inputsSanitized['endDate'] === false) : ?>
                        <p class="text-danger"><?= $msgError['endDate'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="rank" class="form-label">Importance</label>
                    <input type="number" id="rank" name="rank" min="1" max="5" class="form-control"
                           <?php if (isset($submit)): ?>value="<?= $articleDatas['Rank'] ?>"<?php endif; ?>>
                    <?php if (empty($inputsSanitized['rank']) || $inputsSanitized['rank'] === false) : ?>
                        <p class="text-danger"><?= $msgError['rank'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="author" class="form-label">Auteur</label>
                    <input type="text" name="author" id="author" class="form-control"
                           <?php if (isset($submit)): ?>value="<?= $articleDatas['Pseudo'] ?>"<?php endif; ?>>
                    <?php if (empty($inputsSanitized['author']) || $inputsSanitized['author'] === false) : ?>
                        <p class="text-danger"><?= $msgError['author'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="submit" id="submit" name="submit" value="modifier" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
<?php
include 'ressources/views/footer.tpl.php';
?>