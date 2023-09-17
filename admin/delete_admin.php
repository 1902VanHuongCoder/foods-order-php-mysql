<?php

include("../config/constant.php"); // Get codes that connect to database 
$id = $_GET["id"]; //Get user id from URL 

$sql = "DELETE FROM user_accounts WHERE id=$id"; // Delete the user whose id is received from the URL

$query = mysqli_query($conn, $sql); // Execute the query 

if ($query == TRUE) { 
    $_SESSION["delete"] = "Admin is deleted";
    header("location:" . SITE_URL . "admin/manage_admin.php"); // Navigate to manage_admin.php page 
} else {
    $_SESSION["delete"] = "Failed to delete admin";
    header("location:" . SITE_URL . "admin/manage_admin.php"); // Navigate to manage_admin.php page
}
