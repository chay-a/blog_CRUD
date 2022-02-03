<?php
include 'config/database.php';
$queryPage = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
$RoutePath = '';
$routes = [
    NULL => ['app/controllers/homeController.php', 'Accueil', 'CV en ligne de Auriane Chay avec ses compétences'],
    'hobby' => ['pages/hobby.php', 'Hobbies', 'Découvrez les hobbies d\'Auriane Chay'],
    'contact' => ['pages/contact.php','Contact', 'Contactez Auriane Chay pour bénéficier de ses compétences.'],
];

if (isset($routes[$queryPage])){
    $metaTitle = $routes[$queryPage][1];
    $metaDescription = $routes[$queryPage][2];
    $RoutePath = $routes[$queryPage][0];
} else {
    $metaTitle = 'Page non trouvée';
    $metaDescription = 'Désoléee, page non trouvée';
    $RoutePath = 'pages/404.php';
}

//include 'ressources/views/layouts/header.php';
include $RoutePath;
//include 'ressources/views/layouts/footer.php';