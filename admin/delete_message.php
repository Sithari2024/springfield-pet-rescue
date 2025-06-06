<?php
include('../connect.php');

if (isset($_POST['submitButton']) && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize input

    $deleteQuery = "DELETE FROM message WHERE id = $id";
    if (mysqli_query($connection, $deleteQuery)) {
        header("Location: message.php"); // Redirect after successful deletion
        exit();
    } else {
        echo "Error deleting message: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}
?>
