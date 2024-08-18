<?php
require 'users.php';

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
if (!isset($_POST['id'])) {
    require 'partials/notfound.php';

    exit;
}
$users = getUsers();
$userid = $_POST['id'];
$user = getUsersById($userid);

if (!$user) {
    require 'partials/notfound.php';

    exit;
}

deleteUser($userid);

header("location: index.php");
