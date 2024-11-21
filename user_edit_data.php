<?php include 'initialize.php'; ?>

<?php
$user_id = $_GET['user-id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate input
if (empty($firstname)) {
    $error_message = "Firstname is required!";
} elseif (empty($lastname)) {
    $error_message = "Lastname is required!";
} elseif (empty($username)) {
    $error_message = "Username is required!";
} elseif (empty($password)) {
    $error_message = "Password is required!";
} elseif (empty($confirm_password)) {
    $error_message = "Confirm Password is required!";
} elseif ($confirm_password !== $password) {
    $error_message = "Password and confirm password do not match!";
} else {
    $error_message = null;
}

// If there is an error, set session and redirect
if (!empty($error_message)) {
    $_SESSION['alert_message'] = $error_message;
    header('Location: user_edit.php?user-id=' . $user_id);
    exit();
}

// Check if user exists
$query = "SELECT * FROM users WHERE id = " . $user_id;
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_row($result);

if (count($row) <= 0) {
    $_SESSION['alert_message'] = "User does not exist!";
    header('Location: user_edit.php?user-id=' . $user_id);
    exit();
} else {
    // Update the user's information
    $sql = "UPDATE users SET 
            username = '$username', 
            password = '$password', 
            firstname = '$firstname', 
            lastname = '$lastname' 
            WHERE id = $user_id";

    if ($connection->query($sql) === TRUE) {
        $_SESSION['alert_message'] = "Record updated successfully";
        header('Location: user_records.php');
        exit();
    } else {
        echo "Error updating record: " . $connection->error;
    }
}