<?php
require 'users.php';
$users = getusers();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>CRUD Project</title>
</head>
<body>
    <div class="container mt-5">
        <a href="create.php" class="btn btn-success  mt-5">CREATE</a>
        <div class="table-responsive">
            <table class="table" style="width:100%;">
                <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Website</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                
                    <?php foreach($users as $user ): ?>
                        <tr>
                            <td>
                                <?php if(isset($user["extention"])): ?>
                                    <img  width="60px" height="60" style=" border-radius: 50%" src="<?php echo "users/imgs/".$user["id"].".".$user["extention"]; ?>" alt="">
                                <?php endif;?>
                            </td>
                            <td><?php echo $user["name"]?></td>
                            <td><?php echo $user["username"]?></td>
                            <td><?php echo $user["email"]?></td>
                            <td><?php echo $user["phone"]?></td>
                            <td><a href="https://<?php echo $x["website"]?>" target="_blank"><?php echo $user["website"]?></a></td>
                            <td>
                                <a href="view.php?id=<?php echo $user['id']?>" class="btn btn-outline-info">View</a>
                                <a href="update.php?id=<?php echo $user['id']?>" class="btn btn-outline-secondary">Update</a>
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $user["id"]?>">
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>