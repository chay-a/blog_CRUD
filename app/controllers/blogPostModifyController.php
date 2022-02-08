<?php
require 'app/persistences/blogPostData.php';
require 'app/persistences/InputFilter.php';
$queryId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);
if (isset($queryId)) {
    $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
    $msgError = [
        'title' => '',
        'content' => '',
        'startDate' => '',
        'endDate' => '',
        'rank' => '',
        'author' => '',
    ];
    if (isset($submit)){
        $optionsSanitize = [
            'title' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags' => FILTER_FLAG_NO_ENCODE_QUOTES,
            ],
            'content' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags' => FILTER_FLAG_NO_ENCODE_QUOTES,
            ],
            'startDate' => FILTER_SANITIZE_STRING,
            'endDate' => FILTER_SANITIZE_STRING,
            'rank' => FILTER_SANITIZE_NUMBER_INT,
            'author' => FILTER_SANITIZE_STRING,
        ];
        $inputsSanitized = filter_input_array(INPUT_POST, $optionsSanitize);
        $optionsValidate = [
            'title' => [
                'filter' => FILTER_CALLBACK,
                'options' => 'filter_validate_txt',
            ],
            'content' => [
                'filter' => FILTER_CALLBACK,
                'options' => 'filter_validate_txt',
            ],
            'startDate' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => "/^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$/um",
                ],
            ],
            'endDate' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => "/^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$/um",
                ],
            ],
            'rank' => FILTER_VALIDATE_INT,
            'author' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => "/[-'’]\p{L}\p{M}+/um",
                ],
            ],

        ];
        $inputsValidate = filter_var_array($inputsSanitized, $optionsValidate);
        $msgErrorFalse = [
            'title' => 'Veuillez entrer un titre valide',
            'content' => 'Veuillez entrer un contenu valide',
            'startDate' => 'Veuillez entrer une date valide',
            'endDate' => 'Veuillez entrer une date valide',
            'rank' => 'Veuillez entrer un chiffre entre 1 et 5',
            'author' => 'Veuillez entrer un auteur déjà existant',
        ];
        $nbError = 0;
        foreach ($optionsSanitize as $key => $value){
            if (empty($inputsSanitized[$key])) {
                $msgError[$key] = 'Veuiller remplir le champ ' . $key;
                $nbError++;
            } elseif ($inputsSanitized[$key] == false) {
                $msgError[$key] = $msgErrorFalse[$key];
                $nbError++;
            }
        }
        if ($nbError == 0){
            $authorIdSring = authorIdByAuthorPseudo($dbh, $inputsSanitized['author']);
            $authorId = (int) $authorIdSring['ID'];
            blogPostModify($dbh, $queryId, $inputsSanitized['title'], $inputsSanitized['content'], $inputsSanitized['startDate'], $inputsSanitized['endDate'], $inputsSanitized['rank'], $authorId);
        }

    }
    $blogPostInfo = blogPostById($dbh, $queryId);
    require 'ressources/views/blogPostModify.tpl.php';
}