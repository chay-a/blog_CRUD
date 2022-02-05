<?php
function authorCreate($dbh, $authorName, $authorFirstname, $authorPseudo){
    $query = file_get_contents('database/authorCreate.sql');
    $SQLRequest = $dbh->prepare($query);
    $SQLRequest->bindValue(':name', $authorName);
    $SQLRequest->bindValue(':firstname', $authorFirstname);
    $SQLRequest->bindValue(':pseudo', $authorPseudo);
    $SQLRequest->execute();
}
