<?php
require 'app/persistences/blogPostData.php';
$queryId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);
$submit = filter_input(INPUT_POST, 'submit');
$categorised = categoriesByBlogPostId($dbh, $queryId);
$comments = commentsByBlogPost($dbh, $queryId);
$metaTitle = "Suppression de l'article";
$metaDescription = "Suppression d'un article pour le retirer de la base de données";
if (isset($submit)){
    if (!empty($categorised)){
        //Delete rows in table is-Categorised
        blogPostCategoriesDelete($dbh, $queryId);
    }
    if (!empty($comments)){
        //Delete comments attached to the article
        commentsDeleteByArticleId($dbh, $queryId);
    }
    blogPostDelete($dbh, $queryId);
}

require 'ressources/views/blogPostDelete.tpl.php';
