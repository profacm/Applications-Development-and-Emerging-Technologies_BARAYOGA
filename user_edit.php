<?php include 'initialize.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <style type="text/css">
        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <?php
    $user_id = $_GET['user-id'];
    $query = "SELECT * FROM users WHERE id = " . $user_id;
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div align="center">
        <h3>Update User</h3>
        <?php
        if (isset($_SESSION['alert_message'])) {
            echo '<div align="center">' . $_SESSION['alert_message'] . '</div>';
            unset($_SESSION['alert_message']);
        }
        ?>
        <br />
        <form method="POST" action="user_edit_data.php?user-id=<?php echo $user_id; ?>">
            <table class="center" border="1">
                <tr>
                    <td>Firstname:</td>
                    <td><input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"></td>
                </tr>
                <tr>
                    <td>Lastname:</td>
                    <td><input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $row['username']; ?>"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" value="<?php echo $row['password']; ?>"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" value="<?php echo $row['password']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button name="update" type="submit">Update</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>