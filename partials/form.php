<?php 
    include 'partials/header.php';
?>


<div class="container mt-3">
    <div class="card p-3">
        <form method="POST" enctype="multipart/form-data" action="">
            <fieldset>
                <?php if (isset($_GET["id"])): ?>
                    <legend>Update User <?php echo $user['name'] . $user['id']; ?></legend>
                <?php else: ?>
                    <legend>CREATE NEW USER </legend>
                <?php endif ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control <?php echo $error["name"]?  "is-invalid" : "" ?> " value="<?php echo $user['name'] ?>">
                    <div  class="invalid-feedback">
                        Your name is mandatory
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control <?php echo $error["username"]?  "is-invalid" : "" ?>"
                        value="<?php echo $user['username'] ?>">
                        <div  class="invalid-feedback">
                        <?php echo $error["username"]?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input  name="email" id="email" class="form-control <?php echo $error["email"]?  "is-invalid" : "" ?>"
                        value="<?php echo $user['email'] ?>">
                        <div  class="invalid-feedback">
                        <?php echo $error["email"]?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" name="phone" id="phone" class="form-control <?php echo $error["phone"]?  "is-invalid" : "" ?>" value="<?php echo $user['phone'] ?>">
                    <div  class="invalid-feedback">
                        <?php echo $error["phone"]?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="email" name="website" id="website" class="form-control" <?php echo $error["website"]?  "is-invalid" : "" ?>
                        value="<?php echo $user['website'] ?>">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Image</label>
                    <input type="file" name="photo" id="file" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
    </div>
</div>



<?php include 'partials/footer.php'; ?>