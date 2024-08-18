<?php


include 'partials/header.php';

$user = [
    "name" => "",
    "username" => "",
    "phone" => "",
    "email" => "",
    "website" => ""
];

include 'users.php';



$error = [
    "name" => "",
    "username" => "",
    "phone" => "",
    "email" => "",
    "website" => ""
];

$isvalid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // var_dump($_POST);

    $user = array_merge($user, $_POST);

    $isvalid = validate($user, $error);

    if ($isvalid) {
        createUser($user);

        imgExtention($userid);
        header("Location: index.php");
    }




}



include 'partials/form.php';