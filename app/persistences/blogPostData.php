<?php
function lastBlogPosts($dbh) {
    $query = file_get_contents('database/lastBlogPosts.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(1, 10, PDO::PARAM_INT);
    $SQLRequest->execute();
    $last10Articles = $SQLRequest->fetchall(PDO::FETCH_ASSOC);
    return $last10Articles;
}