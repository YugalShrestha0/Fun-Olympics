
<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM usertable WHERE id = $userId";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        // Deletion successful
        header('Location: user.php'); // Redirect to the user view page
        exit(); // Add an exit() statement after redirecting
    } else {
        // Deletion failed
        echo "Error deleting user: " . mysqli_error($conn);
        exit(); // Add an exit() statement to stop further execution
    }
} else {
    // Invalid request, redirect to the user view page
    header('Location: user.php');
    exit(); // Add an exit() statement after redirecting
}
?>
