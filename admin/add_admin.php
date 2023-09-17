<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php include("./partials/menu.php") ?>
    <div>
        Add admin form
        <form action="add_admin.php" method="post">
            <label for="fullname">Full name</label>
            <input type="text" name="fullname" id="fullname" />

            <label for="username">Username</label>
            <input type="text" name="username" id="username" />

            <label for="username">Password</label>
            <input type="password" name="password" id="password" />

            <button type="submit" name="submit">Submit</button> 
        </form>
    </div>
    <?php include("./partials/footer.php") ?>
</body>

</html>

<?php
if (isset($_POST['submit'])) { // Check Form whether is submitted or not 

    $fullname = $_POST["fullname"]; // Get fullname from fullname field 
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Use the md5 method to encrypt password before storing in the database

    $sql = "INSERT INTO user_accounts SET 
        fullname = '$fullname',
        username = '$username',
        password = '$password'
        ";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

    if ($res) {
        $_SESSION["add"] = "Add admin succeded!";
        header("location:" . SITE_URL . "admin/manage_admin.php");
    } else {
        $_SESSION["add"] = "Failed to add admin!";
        header("location:" . SITE_URL . "admin/add_admin.php");
    }
}

?>