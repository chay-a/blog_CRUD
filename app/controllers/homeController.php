<?php
require 'app/persistences/blogPostData.php';
$lastArticles =lastBlogPosts($dbh);
include 'ressources/views/home.tpl.php';