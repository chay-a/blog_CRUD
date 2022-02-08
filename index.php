<?php
include 'config/database.php';
$queryPage = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
$RoutePath = '';
$routes = [
    NULL => ['app/controllers/homeController.php', 'Accueil', 'CV en ligne de Auriane Chay avec ses compétences'],
    'blogPost' => ['app/controllers/blogPostController.php', 'Hobbies', 'Découvrez les hobbies d\'Auriane Chay'],
    'blogPostModify' => ['app/controllers/blogPostModifyController.php','Contact', 'Contactez Auriane Chay pour bénéficier de ses compétences.'],
    'blogPostCreate' => ['app/controllers/blogPostCreateController.php', '', ''],
    'authorCreate' => ['app/controllers/authorCreateController.php', '','']
];
if (isset($queryPage['action'])){
    if (isset($routes[$queryPage['action']])){
        //$metaTitle = $routes[$queryPage['action']][1];
        //$metaDescription = $routes[$queryPage['action']][2];
        $RoutePath = $routes[$queryPage['action']][0];
    } else {
        //$metaTitle = 'Page non trouvée';
        //$metaDescription = 'Désoléee, page non trouvée';
        $RoutePath = 'pages/404.php';
        echo 'wrong';
    }
} else {
    $RoutePath = $routes[$queryPage][0];
}

include $RoutePath;