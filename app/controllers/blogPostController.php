<?php
require 'app/persistences/blogPostData.php';
$queryId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);
if (isset($queryId)) {
    $articleQuery = blogPostById($dbh, $queryId);
    $categories = blogPostCategoriesName($dbh, $queryId);
    $articleCommentsQuery = commentsByBlogPost($dbh, $queryId);
    require 'app/controllers/commentCreateController.php';
    $metaTitle = $articleQuery['Title'];
    $metaDescription = $articleQuery['Cont'];
    $printCategories = '';
    require 'ressources/views/blogPost.tpl.php';
}
