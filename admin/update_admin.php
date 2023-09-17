<?php include("../config/constant.php") ?>
<?php

$id = $_GET["id"]; // Get admin ID from URL to update 

$sql = "SELECT * FROM user_accounts WHERE id=$id"; // Create the query with id that recieved from URL

$res = mysqli_query($conn, $sql); // Execute the query

if ($res == true) { // If the query is successful, that account infor will be returned 
    $count = mysqli_num_rows($res);

    if ($count == 1) {

        $rows = mysqli_fetch_assoc($res); // Get row data from database

        $fullname = $rows["fullname"];
        $username = $rows["username"];
        $id = $rows["id"];
    }
}
?>
<form action="#" method="post">
    <h1>Update Admin</h1>
    <label for="fullname">Full name: </label>
    <input type="text" name="fullname" id="fullname" value="<?php echo $fullname ?>" />

    <label for="username"> Username: </label>
    <input type="text" name="username" id="username" value="<?php echo $username ?>" />

    <input type="hidden" name="id" value="<?php echo $id ?>" />

    <input type="submit" value="Submit" name="submit" />

</form>

<?php
if (isset($_POST["submit"])) { // If form is submitted, the following commands will be executed 
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $id = $_POST["id"];

    $sql = "UPDATE user_accounts SET 
        fullname ='$fullname',
        username = '$username'
        WHERE id=$id"; // Update admin account with new informations 

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION["update"] = "Updated admin account!";
        header("location:" . SITE_URL . "admin/manage_admin.php"); // Navigate Admin to Manage Admin Page
    } else {
        $_SESSION["update"] = "Failed to update admin account!";
        header("location:" . SITE_URL . "admin/manage_admin.php");
    }
}
?>