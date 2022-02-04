<h1><?= $articleQuery['Title'] ?></h1>
<p><?= $articleQuery['Cont']?></p>
<p><?= $articleQuery['Pseudo']?></p>
<?php foreach ($articleCommentsQuery as $value):?>
<blockquote><?= $value['Cont']?></blockquote>
<p><?= $value['Pseudo']?></p>
<?php endforeach; ?>