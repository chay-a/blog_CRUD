<?php
function commentCreate($dbh, $commentContent, $commentAuthor, $articleId){
    $dbh->query("INSERT INTO Comments(Cont, Articles_ID, Authors_ID) VALUES ($commentContent, $articleId, $commentAuthor);");
}