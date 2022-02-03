<?php
function lastBlogPosts($dbh) {
    $query = file_get_contents('database/lastBlogPosts.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, 10, PDO::PARAM_INT);
    $SQLRequest->execute();
    $last10Articles = $SQLRequest->fetchall(PDO::FETCH_ASSOC);
    return $last10Articles;
}

function blogPostById($dbh, $articleId){
    $query = file_get_contents('database/blogPostById.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, $articleId, PDO::PARAM_INT);
    $SQLRequest->execute();
    return $SQLRequest->fetch(PDO::FETCH_ASSOC);
}

function commentsByBlogPost($dbh, $articleId){
    $query = file_get_contents('database/commentsByBlogPost.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, $articleId, PDO::PARAM_INT);
    $SQLRequest->execute();
    return $SQLRequest->fetchall(PDO::FETCH_ASSOC);
}