<?php 
require('connection.php');
session_start();

 //  for login
 if(isset($_POST['login'])){
    $query = "SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'], $result_fetch['password']))
            {
                // checking the massword
                $_SESSION['Logged_in'] = true;
                $_SESSION['username']=$result_fetch['username'];
                header("location: index.php");

            }
            else
            {
                echo "<script>
                alert('Incorrect Password');
                window.location.href='index.php';
                </script>";
            }
        }
        else{
            echo "<script>
        alert('Email or Username Not Registered');
        window.location.href='index.php';
        </script>";
        }
    }else
    {
        echo "<script>
        alert('Can not run Query');
        window.location.href='index.php';
        </script>";
    }
 }


    // For registration
     if(isset($_POST['register'])){
        $user_exist_query = "SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
        $result = mysqli_query($conn, $user_exist_query);

        if($result){
            if(mysqli_num_rows($result)>0){
                // if user has already taken username or email 
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['username']==$_POST['username']){
                    echo "<script>
                    alert('$result_fetch[username] - User Name already Registered');
                    window.location.href='index.php';
                    </script>";
                }
                else{
                    // error for email already registered
                    echo "<script>
                    alert('$result_fetch[email] - Email already Registered');
                    window.location.href='index.php';
                    </script>";
                }
            }
            else
            {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $query = "INSERT INTO `registered_users` (`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]', '$_POST[username]', '$_POST[email]', '$password')";
                
                if(mysqli_query($conn, $query)){
                    // if data inserted 
                    echo "<script>
                    alert('Registration Successful');
                    window.location.href='index.php';
                    </script>";
                }
                else
                {
                    // if data not inserted
                    echo "<script>
                    alert('Can not run Query');
                    window.location.href='index.php';
                    </script>";
                }
            }
        }
        else
        {
            echo "<script>
            alert('Can not run Query');
            window.location.href='index.php';
            </script>";
        }
     }

   


?>