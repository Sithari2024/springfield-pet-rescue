<?php
include '../connect.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $accepted = 1;

    $checkUsername = "SELECT * From users where username='$username'";
    $result = $connection->query($checkUsername);
    
    if ($result->num_rows > 0) {
        echo "Username Already Exists !";
    } else {
        $insertQuery = "INSERT INTO users(firstName,lastName,username,email,password,accepted)
                       VALUES ('$firstName','$lastName','$username','$email','$password', $accepted)";
        if ($connection->query($insertQuery) == TRUE) {
            header("location: signup.php");
        } else {
            echo "Error:" . $connection->error;
        }
    }

    $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
    }


}
?>

<?php
