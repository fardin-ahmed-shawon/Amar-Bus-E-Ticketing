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

<h2 id="incorrect-msg"></h2>
<section>
    <div class="container">
        <div class="logo">
            <img src="img/logo2.png" alt="LOGO2">
        </div>
        <div class="login-box">
            <h1>Login</h1>
            <form action="#" method="POST">
                <input name="mobile" type="text" placeholder="Enter your mobile number">
                <input name="password" type="password" placeholder="Enter your password">
                <a href="#">Forget Password?</a>
                <input name="submit" class="btn" type="submit" value="Login">
                <div class="bottom-link">Don't have an account ? <a href="register.php">Register</a></div>
            </form>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<?php
error_reporting(0);

// database conncection
$con = mysqli_connect("localhost", "root","", "amarbus");


// input data
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$submit = $_POST['submit'];

// retrive data from database
$sql = "SELECT * FROM user_info";
$data = mysqli_query($con, $sql);
$total = mysqli_num_rows($data);

// login authentication
$count = 0;
if ($submit) {
    if ($mobile != "" && $password != "") {
        if ($total !=0) {
            while($result = mysqli_fetch_array($data)) {
                if ($result['mobile'] == $mobile && $result['password'] == $password) {
                    ?>
                    <script>
                        const em = document.getElementById('incorrect-msg');
                        em.innerHTML = "Successfully Login...";

                        // set local storage data
                        var sidebar_show = 1;
                        localStorage.setItem('sidebar-show', sidebar_show);
                    </script>
                    <?php
                    $count++;
                    break;
                }
            }
            if ($count == 0) {
                ?>
                <script>
                    const em = document.getElementById('incorrect-msg');
                    em.innerHTML = "Incorrect information!";
                </script>
                <?php
            } else {
                ?>
                <META HTTP-EQUIV="Refresh" CONTENT="1;URL=home.php?">
                <?php
                // creating session variable for using these data into another pages
                session_start();
                $_SESSION['user_name'] = $result['name'];
                $_SESSION['user_nid'] = $result['nid'];
                $_SESSION['user_email'] = $result['email'];
                $_SESSION['user_mobile'] = $result['mobile'];
            }
        } else {
            ?>
                <script>
                    const em = document.getElementById('incorrect-msg');
                    em.innerHTML = "User Not Exist!";
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
<script src="main.js"></script>

</body>
</html>