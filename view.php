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
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <?php echo $user['name'] ?></h3>
        </div>
        <div class="card-body">
            <a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-outline-secondary">Update</a>
            <form action="delete.php" method="POST" style="display: inline;">
                <input type="hidden" name="id" value="<?php echo $user["id"] ?>">
                <button class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
        <table class="table m-0">
            <tr>
                <th><?php echo "Name:" ?></th>
                <td><?php echo $user['name'] ?></td>
            </tr>

            <tr>
                <th><?php echo "Username:" ?></th>
                <td><?php echo $user['username'] ?></td>
            </tr>
            <tr>
                <th><?php echo "Eamil:" ?></th>
                <td><?php echo $user['email'] ?></td>
            </tr>
            <tr>
                <th><?php echo "Phone:" ?></th>
                <td><?php echo $user['phone'] ?></td>
            </tr>
            <tr>
                <th><?php echo "Website:" ?></th>
                <td><a href="https://<?php echo $user["website"] ?>" target="_blank"><?php echo $user["website"] ?></a>
                </td>
            </tr>
        </table>
    </div>

</div>


<?php
include 'partials/footer.php';
?>