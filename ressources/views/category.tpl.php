<?php
require 'ressources/views/header.tpl.php';
foreach ($blogPostByCategory as $value) : ?>
<a href="index.php?action=blogPost&id=<?=$value['ID']?>"><?= $value['Title']?></a>
<?php endforeach;
require 'ressources/views/footer.tpl.php';