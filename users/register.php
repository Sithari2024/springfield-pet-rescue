<?php
include '../connect.php';
session_start();

// REGISTER
if (isset($_POST['signUp'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $accepted = 1;

    // Hash password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username exists
    $check = $connection->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Username Already Exists!";
    } else {
        $insert = $connection->prepare("INSERT INTO users (firstName, lastName, username, email, password, accepted, admin) VALUES (?, ?, ?, ?, ?, ?, 0)");
        $insert->bind_param("sssssi", $firstName, $lastName, $username, $email, $hashedPassword, $accepted);
        if ($insert->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $insert->insert_id;
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $insert->error;
        }
    }
    $check->close();
}

// LOGIN
if (isset($_POST['signIn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT id, username, password, admin FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];

            if ($row["admin"] == 1) {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}
?>
