<?php
require 'app/persistences/blogPostData.php';
if (isset($queryPage['id'])) {
    $articleQuery = blogPostById($dbh, $queryPage['id']);
    require 'ressources/views/blogPost.tpl.php';
}
