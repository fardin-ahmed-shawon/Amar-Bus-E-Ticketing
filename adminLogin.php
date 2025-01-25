<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css/adminLogin.css?v=1.0">
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
            <h1>Admin Login</h1>
            <form action="#" method="POST">
                <input name="username" type="text" placeholder="Enter your username" required>
                <input name="password" type="password" placeholder="Enter your password" required>
                <a href="#">Forget Password?</a>
                <input name="submit" class="btn" type="submit" value="Login">
            </form>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<?php
error_reporting(0);
// database conncection
$con = mysqli_connect("localhost", "root","", "amarbus");

// Input data
$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];

// Retrieve Data from the database
$sql = "SELECT * FROM admin_info";
$data = mysqli_query($con, $sql);
$total = mysqli_num_rows($data);

if ($submit) {
    if ($total != 0) {
        while($result = mysqli_fetch_array($data)) {
            if ($username == $result['username'] && $password == $result['password']) {
                ?>
                <script>
                    const em = document.getElementById('msg');
                    em.innerHTML = "Successfully Login...";
                </script>
                <META HTTP-EQUIV="Refresh" CONTENT="1;URL=adminHome.php">
                <?php
            } else {
                ?>
                <script>
                    const em = document.getElementById('msg');
                    em.innerHTML = "Incorrect information!";
                </script>
                <?php
            }
        }
    }    
}

?>

</body>
</html>