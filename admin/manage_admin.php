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
        Manage - Admin
        <br />
        <?php
        if (isset($_SESSION["add"])) { // Check session whether has data or not
            echo $_SESSION["add"];
            unset($_SESSION["add"]); // Clear session data 
        }
        if (isset($_SESSION["delete"])) {
            echo $_SESSION["delete"];
            unset($_SESSION["delete"]);
        }
        if (isset($_SESSION["update"])) {
            echo $_SESSION["update"];
            unset($_SESSION["update"]);
        }
        ?>
        <br />
        <a href="add_admin.php">Add Admin</a>

        <br />
        <table>
            <thead>
                <td>STT</td>
                <td>Fullname</td>
                <td>Username</td>
            </thead>
            <?php

            $sql = "SELECT * FROM user_accounts"; // Retrieve datas from user_accounts table in database

            $res = mysqli_query($conn, $sql);  // Receive datas are returned by query calling

            $n = 0; // Is used to show order of admins
            if ($res == TRUE) {
                $count = mysqli_num_rows($res); // Count amount of rows are responded from database

                if ($count > 0) { // If the number of rows of data returned is greater than 0 then show these rows

                    while ($rows = mysqli_fetch_assoc($res)) { // Loop to show all datas responsed from database 
                        $id = $rows["id"];
                        $fullname = $rows["fullname"];
                        $username = $rows["username"];
            ?>
                        <tr>
                            <td><?php echo $n++; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITE_URL ?>admin/change_password_admin.php?id=<?php echo $id ?>">Change Password</a>
                            </td>
                            <td>
                                <a href="<?php echo SITE_URL ?>admin/delete_admin.php?id=<?php echo $id ?>">Delete</a>
                            </td>
                            <td>
                                <a href="<?php echo SITE_URL ?>admin/update_admin.php?id=<?php echo $id ?>">Update</a>
                            </td>
                        </tr>
            <?php
                    }
                }
            }

            ?>
        </table>

    </div>
    <?php include("./partials/footer.php") ?>
</body>

</html>