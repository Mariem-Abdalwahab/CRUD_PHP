<?php
require 'users.php';

if (!isset($_GET['id'])) {
    require 'partials/notfound.php';

    exit;
}

$userid = $_GET['id'];
$user = getUsersById($userid);

if (!$user) {
    require 'partials/notfound.php';

    exit;
}

include 'partials/header.php';

$error = [
    "name" => "",
    "username" => "",
    "phone" => "",
    "email" => "",
    "website" => ""
];

if( $_SERVER["REQUEST_METHOD"] == "POST"){

    $isvalid = validate($user, $error);

    if ($isvalid) {
        $user = updateuser($_POST, $userid);
        imgExtention($userid);
        header("Location: index.php");
    }
    
    
    
}

?>

<?php include "partials/form.php"?>

