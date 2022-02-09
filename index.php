<?php
include 'config/database.php';
$queryAction = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
$RoutePath = '';
$routes = [
    NULL => 'app/controllers/homeController.php',
    'blogPost' => 'app/controllers/blogPostController.php',
    'blogPostModify' => 'app/controllers/blogPostModifyController.php',
    'blogPostCreate' => 'app/controllers/blogPostCreateController.php',
    'blogPostDelete' => 'app/controllers/blogPostDeleteController.php',
    'authorCreate' => 'app/controllers/authorCreateController.php',
    'blogPostCategory' => 'app/controllers/blogPostCategoryController.php'
];
if (isset($routes[$queryAction])) {
    $RoutePath = $routes[$queryAction];
} else {
    $RoutePath = 'pages/404.php';
    echo 'wrong';
}

include $RoutePath;