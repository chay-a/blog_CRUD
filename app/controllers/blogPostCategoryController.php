<?php
require 'app/persistences/blogPostData.php';
$category = filter_input(INPUT_GET, 'name');
if (isset($category)) {
    $blogPostByCategory = blogPostByCategory($dbh, $category);
    require 'ressources/views/category.tpl.php';
}
