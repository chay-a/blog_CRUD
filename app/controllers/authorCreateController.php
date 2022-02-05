<?php
require 'app/persistences/authorData.php';
require 'app/persistences/InputFilter.php';
$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
$msgError = [
    'name' => '',
    'firstname' => '',
    'pseudo' => ''
];
if (isset($submit)){
    $optionsSanitize = [
        'name' => FILTER_SANITIZE_STRING,
        'firstname' => FILTER_SANITIZE_STRING,
        'pseudo' => FILTER_SANITIZE_STRING,
    ];
    $inputsSanitized = filter_input_array(INPUT_POST, $optionsSanitize);
    $optionsValidate = [
        'name' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => [
                'regexp' => "/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u",
            ],
        ],
        'firstname' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => [
                'regexp' => "/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u",
            ],
        ],
        'pseudo' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => [
                'regexp' => "/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u",
            ],
        ],
    ];
    $inputsValidate = filter_var_array($inputsSanitized, $optionsValidate);
    $msgErrorFalse = [
        'name' => 'Veuillez entrer un nom valide',
        'firstname' => 'Veuillez entrer un prénom valide',
        'pseudo' => 'Veuillez entrer un pseudo valide',
    ];
    $nbError = 0;
    foreach ($optionsSanitize as $key => $value){
        if (empty($inputsSanitized[$key])) {
            if ($key != 'firstname'){
                $msgError[$key] = 'Veuiller remplir le champ ' . $key;
                $nbError++;
            } else {
                $inputsValidate['firstname'] = NULL;
            }
        } elseif ($inputsValidate[$key] == false) {
            $msgError[$key] = $msgErrorFalse[$key];
            $nbError++;
        }
    }
    if ($nbError == 0){
        authorCreate($dbh, $inputsValidate['name'], $inputsSanitized['firstname'], $inputsValidate['pseudo']);
    }
}
require 'ressources/views/authorCreate.tpl.php';