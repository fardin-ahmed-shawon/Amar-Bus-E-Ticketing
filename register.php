<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css/register.css">
    <style>
        h2 {
            background-color: white;
            font-size: 2rem;
            text-align: center; 
            display: block; 
            font-weight: 400;
        }
    </style> 
</head>
<body>

<h2 id="incorrect-msg"></h2>
<section>
    <div class="container">
        <div class="logo">
            <img src="img/logo2.png" alt="LOGO2">
        </div>
        <div class="login-box">
            <h1>Register</h1>
            <form action="#" method="POST">
                <div class="col-2">
                    <input name="name" class="input-gap" type="text" placeholder="Enter your name">
                </div>
                <div class="col-2 col-align-right">
                    <input name="mobile" class="input-gap" type="text" placeholder="Enter your mobile number">
                </div>


                <div class="col-2">
                    <input name="nid" class="input-gap" type="text" placeholder="Enter your NID number">
                </div>
                <div class="col-2 col-align-right">
                    <input name="email" class="input-gap" type="email" placeholder="Enter your email">
                </div>


                <div class="col-2">
                    <input name="password" class="input-gap" type="password" placeholder="Enter your password">
                </div>
                <div class="col-2 col-align-right">
                    <input name="conPass" class="input-gap" type="password" placeholder="Confirm your password">
                </div>

                <input name="submit" class="btn" type="submit" value="Register">
                
                <div class="bottom-link">Already have an account ? <a href="login.php">Login</a></div>
            </form>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<?php
error_reporting(0);

// database connection
$con = mysqli_connect("localhost", "root","", "amarbus");


// input's value
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$nid = $_POST['nid'];
$email = $_POST['email'];
$password = $_POST['password'];
$conPass = $_POST['conPass'];

// Insert data into the table
$sql2 = "INSERT INTO user_info values ('$nid', '$name', '$mobile', '$email', '$password')";

if ($_POST['submit']) {
    if ($name != "" && $mobile != "" && $nid != "" && $email != "" && $password != "" && $conPass != "") {
        if ($password == $conPass) {
            mysqli_query($con, $sql2);
            ?>
            <script>
                const em = document.getElementById('incorrect-msg');
                em.innerHTML = "Registration Successful...";
            </script>
            <META HTTP-EQUIV="Refresh" CONTENT="1; URL=login.php">
            <?php
        } else {
            ?>
            <script>
                const em = document.getElementById('incorrect-msg');
                em.innerHTML = "Password didn't match!";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            const em = document.getElementById('incorrect-msg');
            em.innerHTML = "All fields are required!";
        </script>
        <?php
    }
}

?>
    
</body>
</html>