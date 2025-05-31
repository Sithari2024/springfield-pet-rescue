<?php include "header.php"?>
<!DOCTYPE html>
<html lang="en">



  
    <!-- SignUp -->
    <div class="auth-form" id="signup">
        <h1 class="form-title">ADD NEW USER</h1>
        <form id="signupForm" method="post" action="register.php">
            <div class="input-group">
                <input type="text" name="firstName" id="firstName" required>
                <label for="firstName">First Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="lName" id="lName" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="username" id="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
            <div id="error-message" class="error-message"></div>
            <button type="submit" class="btn" name="signUp">Add User</button>
        </form>
    </div>
    <link rel="stylesheet" href="../css/login.css">

     <?php
    include 'footer.php';
    ?> 