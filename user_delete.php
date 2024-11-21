<?php include 'initialize.php'; ?>
<?php
$user_id = $_GET['user-id']; // Corrected variable name syntax
$sql = "DELETE FROM users WHERE id = " . $user_id; // Fixed SQL query syntax

if ($connection->query($sql) === TRUE) { // Corrected the if condition syntax
    $_SESSION['alert_message'] = "Record has been deleted!";
    header('Location: user_records.php');
    exit(); // Added exit() to stop further script execution
} else {
    echo "Error deleting record: " . $connection->error; // Corrected error handling syntax
}