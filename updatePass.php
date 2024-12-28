<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css/login.css">
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

<h2 id="msg"></h2>
<section>
    <div class="container">
        <div class="logo">
            <img src="img/logo2.png" alt="LOGO2">
        </div>
        <div class="login-box">
            <h1>Update Password</h1>
            <form action="#" method="POST">
                <input name="password" type="password" placeholder="Enter your new password">
                <input name="conPass" type="password" placeholder="Re-enter your password">
                <input name="submit" class="btn" type="submit" value="Update">
            </form>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>
    
</body>
</html>

<?php
error_reporting(0);

// database conncection
$con = mysqli_connect("localhost", "root","", "amarbus");

// input's value
$password = $_POST['password'];
$conPass = $_POST['conPass'];
$submit = $_POST['submit'];

session_start();
$nid = $_SESSION['user_nid'];

// update password from 'user_info' table
$sql = "UPDATE user_info SET password='$password' WHERE nid='$nid'";

if ($submit) {
    if ($password != "" && $conPass != "") {
        if ($password == $conPass) {
            // query
            mysqli_query($con, $sql);
            ?>
            <script>
                const em = document.getElementById('msg');
                em.innerHTML = "Password Updated...";
            </script>
            <META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/test/E-Ticketing/profile.php">
            <?php
        } else {
            ?>
            <script>
                const em = document.getElementById('msg');
                em.innerHTML = "Password didn't match!";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            const em = document.getElementById('msg');
            em.innerHTML = "All fields are required!";
        </script>
        <?php
    }
}

?>