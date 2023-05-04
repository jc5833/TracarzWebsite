<?php
    session_start();

    $error_message = '';
    
    if ($_POST){
        include ('PHP/Connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query  = 'SELECT * FROM users WHERE users.email="'. $username . '" AND users.password="'. $password . '"';

        $stmt = $conn->prepare($query);
        $stmt->execute();


        if ($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;

            header('Location: Dashboard.php');
        }else $error_message = 'Please make sure that username and password are correct';
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
    
    <?php
    if(!empty($error_message)) { ?>
    <div id = "errormessage">
    <strong>ERROR:</strong> <p><?= $error_message ?> </p>
    </div>
    <?php } ?>

    <nav>
        <ul>
            <li><a href="Home.php"> Home </a></li>
            <li><a href="Login.php">Log In</a></li>
            <li><a href="Aboutus.php"> About Us </a></li>
            <li><a href="Contact.php"> Contact </a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="LogInHeader">
            <h1>Tracarz</h1>
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
</body>
</html>