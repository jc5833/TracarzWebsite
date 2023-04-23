<?php
    if ($_POST){
        $username =$_POST['username'];
        $password = $_POST['password'];

        include('PHP/Connection.php');
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
    <nav>
        <ul>
            <li><a href="Home.php"> Home </a></li>
            <li><a href="Login.php">Log In</a></li>
            <li><a href="Aboutus.php"> About Us </a></li>
            <li><a href="Contact.php"> Contact </a></li>
        </ul>
    </nav>
</head>
<body id="Login">
    <div class="container">
        <div class="LogInHeader">
            <h1>tbd</h1>
            <p>Vehicle inventory system</p>
        </div>
        <div class="LogInBody">
           <form action="Login.php" method="POST">
            <div class="LogInInputContainer">
                <label for="U">Username</label>
                <input placeholder="Username" name="username" type="text"/>
            </div>
            <div class="LogInInputContainer">
                <label for="">Password</label>
                <input placeholder="Password" name="password" type="password"/>
            </div>
            <div class="LogInButtonContainer">
                <button>Login</button>
            </div>
           </form> 
        </div>
    </div>
    <script>
        function onlclickfnc(){
            document.location.href="Dasboard.html";
        }
    </script>
</body>
</html>