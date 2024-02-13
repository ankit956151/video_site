<?php 
     require('connection.php');
     session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video site</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <header>
        <h2>Video Player</h2>
        <nav>
        <a href="index.php">Home</a>
            <a href="upload.php">Upload</a>
            <a href="recent.php">Recent</a>
        </nav>
        <?php 
             if(isset($_SESSION['Logged_in']) && $_SESSION["Logged_in"]==true){
                echo "
                <div class='user'>
                User - $_SESSION[username] - <a href='logout.php'>Logout</a>
                </div>
                ";
             }
             else{
                echo "<div class='sign-in-up'>
                <button type='button' onclick=\"popup('login-popup')\">Login</button>
                <button type='button' onclick=\"popup('register-popup')\">Register</button>
            </div>";
             }
        ?>
        
    </header>

    <!-- Login form -->

    <div class="popup-container" id="login-popup">
        <div class="popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>User Login</span>
                    <button type="reset" onclick="popup('login-popup')">x</button>
                </h2>
                <input type="text" placeholder="E-mail or username" name="email_username">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" class="login-btn" name="login">Login</button>
            </form>
        </div>
    </div>

    <div class="popup-container" id="register-popup">
        <div class="register popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>User Register</span>
                    <button type="reset" onclick="popup('register-popup')">x</button>
                </h2>
                <input type="text" placeholder="Full name" name="fullname">
                <input type="text" placeholder="Username" name="username">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" class="register-btn" name="register">Register</button>
            </form>
        </div>
    </div>


    <?php 
    
     if(isset($_SESSION['Logged_in']) && $_SESSION["Logged_in"]==true){
        echo '<h2 style="text-align:center; color:white; margin-top:10px;">Recent Watch Video</h2>';
     }
?>



    <script src="script.js"></script>
</body>
</html>