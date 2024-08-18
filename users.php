<?php

function getUsers()
{
    return json_decode(file_get_contents("users.json"), true); // convert json object to php object, the true value is to convert the object to an array

}



function getUsersById($id)
{

    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }

    return null;

}

function createUser($data)
{
    $users = getUsers();

    $data["id"] = rand(10000, 20000);
    $data["extention"] = imgExtention($data["id"]);

    array_push($users, $data);

    file_put_contents("users.json", json_encode($users));

}


function updateuser($data, $id)
{
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $updateduser = $users[$i] = array_merge($user, $data);
        }
    }

    file_put_contents("users.json", json_encode($users));
    return $updateduser;
}

function deleteUser($id)
{
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
        file_put_contents("users.json", json_encode($users));




    }

}

function validate($data, &$error)
{
    $isvalid = true;

    if (!$data["name"]) {
        $error["name"] = "no name";
        $isvalid = false;
    }

    if (!$data["username"] || strlen($data["username"]) < 5 || strlen($data["username"]) > 16) {
        $error["username"] = "Username must be between 5 and 16";
        $isvalid = false;
    }

    if (!$data["email"] || !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $error["email"] = "Email must be valid";
        $isvalid = false;
    }

    if (!filter_var($data["phone"], FILTER_VALIDATE_INT)) {
        $error["phone"] = "Phone unvalid";
        $isvalid = false;
    }

    return $isvalid;
}

function imgExtention($userid)
{

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        if (!is_dir("users/imgs")) {
            mkdir("users/imgs");
        }
        // Extention of photo
        $pos = strpos($_FILES["photo"]["name"], ".");
        $ext = substr($_FILES["photo"]["name"], $pos + 1);

    
        move_uploaded_file($_FILES["photo"]["tmp_name"], "users/imgs/$userid.$ext"); // move_uploaded_file(data you will move,path);
    }

    return $ext;
}