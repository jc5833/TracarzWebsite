<?php
session_start();

$error_message = '';
$register_error_message = '';

if ($_POST) {
    include('PHP/Connection.php');

    if (isset($_POST['login'])) {
        $email = $_POST['email']; // Changed from username to email
        $password = $_POST['password'];

        $query  = 'SELECT * FROM users WHERE users.email = ? AND users.password = ?';
        $stmt = $conn->prepare($query);
        $stmt->execute([$email, $password]);

        if ($stmt->rowCount() > 0) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;

            header('Location: Dashboard.php');
            exit(); // Always include exit after header redirection
        } else {
            $error_message = 'Please make sure that email and password are correct';
        }
    } elseif (isset($_POST['register'])) {
        $email = $_POST['register_email'];
        $first_name = $_POST['register_first_name'];
        $last_name = $_POST['register_last_name'];
        $password = $_POST['register_password'];
        $confirm_password = $_POST['register_confirm_password'];

        if ($password != $confirm_password) {
            $register_error_message = 'Passwords do not match';
        } else {
            $query  = 'INSERT INTO users (email, first_name, last_name, password) VALUES (?, ?, ?, ?)';
            $stmt = $conn->prepare($query);
            $stmt->execute([$email, $first_name, $last_name, $password]);

            $register_error_message = 'Account created successfully. You can now log in.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="CSS/Login.css">
</head>
<body id="Login">
    
    <?php if (!empty($error_message)) { ?>
    <div id="errormessage">
        <strong>ERROR:</strong> <p><?= $error_message ?> </p>
    </div>
    <?php } ?>

    <?php if (!empty($register_error_message)) { ?>
    <div id="errormessage">
        <strong>REGISTER:</strong> <p><?= $register_error_message ?> </p>
    </div>
    <?php } ?>

    <nav id="secondary">
        <ul>
            <li><a href="Home.php"> Home </a></li>
            <li><a href="Login.php">Log In</a></li>
            <li><a href="Aboutus.php"> About Us </a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="LogInHeader">
            <h1>Tracarz</h1>
            <p>Vehicle inventory system</p>
        </div>
        <div class="LogInBody">
            <!-- Login form -->
            <form action="Login.php" method="POST" id="login-form">
                <div class="LogInInputContainer">
                    <label for="email">Email</label>
                    <input placeholder="Email" name="email" type="email" required/>
                </div>
                <div class="LogInInputContainer">
                    <label for="">Password</label>
                    <input placeholder="Password" name="password" type="password" required/>
                </div>
                <div class="LogInButtonContainer">
                    <button name="login">Login</button>
                </div>
            </form> 

            <h2>Don't have an account? Register here:</h2>

            <!-- Hidden register form -->
            <form action="Login.php" method="POST" id="register-form" style="display: none;">
                <div class="LogInInputContainer">
                    <label for="register_email">Email</label>
                    <input placeholder="Email" name="register_email" type="email" required/>
                </div>
                <div class="LogInInputContainer">
                    <label for="register_first_name">First Name</label>
                    <input placeholder="First Name" name="register_first_name" type="text" required/>
                </div>
                <div class="LogInInputContainer">
                    <label for="register_last_name">Last Name</label>
                    <input placeholder="Last Name" name="register_last_name" type="text" required/>
                </div>
                <div class="LogInInputContainer">
                    <label for="">Password</label>
                    <input placeholder="Password" name="register_password" type="password" required/>
                </div>
                <div class="LogInInputContainer">
                    <label for="">Confirm Password</label>
                    <input placeholder="Confirm Password" name="register_confirm_password" type="password" required/>
                </div>
                <div class="LogInButtonContainer">
                    <button name="register">Register</button>
                </div>
            </form>

            <!-- Button to toggle between forms -->
            <button id="toggle-register" onclick="toggleRegister()">Register</button>
        </div>
    </div>

    <!-- JavaScript code to toggle between login and register forms -->
    <script>
        function toggleRegister() {
            var loginForm = document.getElementById("login-form");
            var registerForm = document.getElementById("register-form");
            var toggleButton = document.getElementById("toggle-register");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
                toggleButton.textContent = "Register";
            } else {
                loginForm.style.display = "none";
                registerForm.style.display = "block";
                toggleButton.textContent = "Back to Login";
            }
        }
    </script>
</body>
</html>
