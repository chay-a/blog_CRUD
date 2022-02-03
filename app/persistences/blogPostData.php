<?php
function lastBlogPosts($dbh) {
    $query = file_get_contents('database/lastBlogPosts.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->execute();
    $last10Articles = $SQLRequest->fetchall(PDO::FETCH_ASSOC);
    return $last10Articles;
}