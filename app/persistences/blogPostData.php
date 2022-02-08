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
function authorIdByAuthorPseudo($dbh, $authorPseudo){
    $query = file_get_contents('database/authorsIdByAuthorsPseudo.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, $authorPseudo);
    $SQLRequest->execute();
    return $SQLRequest->fetch(PDO::FETCH_ASSOC); //tableau ['ID'] => string
}
function blogPostCreate($dbh, $articleTitle, $articleContent, $articleStartDate, $articleEndDate, $articleRank, $authorId) {
    $query = file_get_contents('database/blogPostCreate.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(':title', $articleTitle);
    $SQLRequest->bindValue(':content', $articleContent);
    $SQLRequest->bindValue(':startDate', $articleStartDate);
    $SQLRequest->bindValue(':endDate', $articleEndDate);
    $SQLRequest->bindValue(':rank', $articleRank, PDO::PARAM_INT);
    $SQLRequest->bindValue(':authorId', $authorId, PDO::PARAM_INT);
    $SQLRequest->execute();
}

function blogPostModify($dbh, $articleId, $articleTitle, $articleContent, $articleStartDate, $articleEndDate, $articleRank, $authorId){
    $query = file_get_contents('database/blogPostModify.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(':title', $articleTitle);
    $SQLRequest->bindValue(':content', $articleContent);
    $SQLRequest->bindValue(':startDate', $articleStartDate);
    $SQLRequest->bindValue(':endDate', $articleEndDate);
    $SQLRequest->bindValue(':rank', $articleRank, PDO::PARAM_INT);
    $SQLRequest->bindValue(':authorId', $authorId, PDO::PARAM_INT);
    $SQLRequest->bindValue('articleID', $articleId);
    $SQLRequest->execute();
}

function categoriesByBlogPostId ($dbh, $articleId){
    $query = file_get_contents('database/categoriesByBlogPostId.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, $articleId);
    $SQLRequest->execute();
    return $SQLRequest->fetchall(PDO::FETCH_ASSOC);
}

function blogPostCategoriesDelete($dbh, $articleId){
    $query = file_get_contents('database/blogPostCategoriesDelete.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, $articleId);
    $SQLRequest->execute();
}

function commentsDeleteByArticleId($dbh, $articleId){
    $query = file_get_contents('database/commentsDeleteByArticle.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, $articleId);
    $SQLRequest->execute();
}

function blogPostDelete($dbh, $articleId){
    $query = file_get_contents('database/blogPostDelete.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, $articleId);
    $SQLRequest->execute();
}