<?php
require 'app/persistences/blogPostData.php';
$lastArticles =lastBlogPosts($dbh);
$metaTitle = 'Accueil';
$metaDescription = 'Affichage des derniers artciles';
include 'ressources/views/home.tpl.php';