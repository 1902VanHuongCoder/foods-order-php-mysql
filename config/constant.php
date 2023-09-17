<?php

session_start();
define("SITE_URL", "http://localhost/food_order/"); // define this constant to avoid duplication this URL
define("LOCALHOST", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DB_NAME", "foods_order");
$conn = mysqli_connect(LOCALHOST, USER_NAME, PASSWORD) or die(mysqli_error($conn));

$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));
