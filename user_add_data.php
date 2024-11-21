<?php include 'initialize.php'; ?>

<?php
// Collecting form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Error handling
if (empty($firstname)) {
    $error_message = "Firstname is required!";
} elseif (empty($lastname)) {
    $error_message = "Lastname is required!";
} elseif (empty($password)) {
    $error_message = "Password is required!";
} elseif (empty($username)) {
    $error_message = "Username is required!";
} elseif (empty($confirm_password)) {
    $error_message = "Confirm Password is required!";
} elseif ($confirm_password !== $password) {
    $error_message = "Password and confirm password do not match!";
} else {
    $error_message = null;
}

// If there is an error, store the message in a session and redirect to the user_add.php page
if (!empty($error_message)) {
    $_SESSION['alert_message'] = $error_message;
    header('Location: user_add.php');
    exit();
} else {
    // If no errors, proceed with database insertion
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Securely hash the password
    $sql = "INSERT INTO users (firstname, lastname, username, password) VALUES ('$firstname', '$lastname', '$username', '$hashed_password')";

    if ($connection->query($sql) === TRUE) {
        $_SESSION['alert_message'] = "New record has been created!";
        header('Location: user_records.php');
        exit();
    } else {
        die("Error: " . $connection->error);
    }
}
?>