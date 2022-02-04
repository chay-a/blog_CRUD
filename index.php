<?php
include 'config/database.php';
$options = [
    'action' =>FILTER_SANITIZE_ENCODED,
    'id' =>FILTER_SANITIZE_ENCODED
];
$queryPage = filter_input_array(INPUT_GET,$options);
$RoutePath = '';
$routes = [
    NULL => ['app/controllers/homeController.php', 'Accueil', 'CV en ligne de Auriane Chay avec ses compétences'],
    'blogPost' => ['app/controllers/blogPostController.php', 'Hobbies', 'Découvrez les hobbies d\'Auriane Chay'],
    'blogPostModify' => ['pages/contact.php','Contact', 'Contactez Auriane Chay pour bénéficier de ses compétences.'],
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