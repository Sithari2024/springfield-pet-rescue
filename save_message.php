<?php
include 'connect.php';

if (isset($_POST['save'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'] ?? 'Not specified';
    $content = $_POST['message'];

    $insertQuery = "INSERT INTO message (username, email, subject, content)
                    VALUES ('$username', '$email', '$subject', '$content')";

    if ($connection->query($insertQuery) === TRUE) {
        header("Location: contact.php"); 
        exit();
    } else {
        echo "Error: " . $connection->error;
    }
}
?>
