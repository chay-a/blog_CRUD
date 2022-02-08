<?php
require 'app/persistences/blogPostData.php';
$queryId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);
if (isset($queryId)) {
    $articleQuery = blogPostById($dbh, $queryId);
    $articleCommentsQuery = commentsByBlogPost($dbh, $queryId);
    require 'ressources/views/blogPost.tpl.php';
}
