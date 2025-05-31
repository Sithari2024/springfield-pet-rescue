<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/nav.css">
</head>

<body>

    <header>
        <nav class="navbar">
            <div class="logo"><img src="../img/logo.png" alt="LOGO" width="80"></div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="../about_us.php" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="../facts.php" class="nav-link">Facts</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
                <li class="nav-item"><a href="users/login.php" class="nav-link active">Login</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <!-- SignUp -->
    <div class="auth-form" id="signup" style="display:none;">
        <h1 class="form-title">Register</h1>
        <form id="signupForm" method="post" action="register.php">
            <div class="input-group">
                <input type="text" name="firstName" id="firstName" required>
                <label for="firstName">First Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="lastName" id="lastName" required>
                <label for="lastName">Last Name</label>
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
            <button type="submit" class="btn" name="signUp">Sign Up</button>
        </form>
        <p class="auth-switch">
            Already have an account? <button id="signInButton" class="text-button">Sign In</button>
        </p>
    </div>

    <!-- SignIn -->
    <div class="auth-form" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <input type="text" name="username" id="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn" name="signIn">Sign In</button>
        </form>
        <p class="auth-switch">
            Don't have an account? <button id="signUpButton" class="text-button">Sign Up</button>
        </p>
    </div>

    <script src="../js/login.js"></script>
    <link rel="stylesheet" href="../css/login.css">

    <?php include 'footer.php'; ?>
</body>
</html>
