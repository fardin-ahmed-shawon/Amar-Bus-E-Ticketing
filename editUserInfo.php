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
        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-left: 5px;
        }
        .right-lbl-tag {
            margin-left: 15px;
        }
        @media only screen and (max-width: 830px) {
            .right-lbl-tag {
                margin-left: 0px;
            }
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
            <h1>Update Information</h1>
            <form action="#" method="POST">
                <div class="col-2">
                    <label for="name">Name: </label>
                    <input value="<?php
                        session_start();
                        echo $_SESSION['user_name'];
                        ?>" name="name" class="input-gap" type="text" placeholder="Enter your name">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="mobile">Mobile: </label>
                    <input value="<?php
                        echo $_SESSION['user_mobile'];
                        ?>" name="mobile" class="input-gap" type="text" placeholder="Enter your mobile number">
                </div>


                <div class="col-2">
                    <label for="nid">NID No: </label>
                    <input value="<?php
                        echo $_SESSION['user_nid'];
                        ?>" name="nid" class="input-gap" type="text" placeholder="Enter your NID number">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="email">Email: </label>
                    <input value="<?php
                        echo $_SESSION['user_email'];
                        ?>" name="email" class="input-gap" type="email" placeholder="Enter your email">
                </div>

                <input name="submit" class="btn" type="submit" value="Update">
            </form>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<script>
    var ind = localStorage.getItem('sidebar-show');
        if (ind != 1) {
            window.location.href = "http://localhost/test/E-Ticketing/login.php";
        }
</script>
</body>
</html>

<?php
error_reporting(0);

// database conncection
$con = mysqli_connect("localhost", "root","", "amarbus");

// input's value
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$nid = $_POST['nid'];
$email = $_POST['email'];
$submit = $_POST['submit'];

// update data from 'user_info' table
$sql = "UPDATE user_info SET name='$name', mobile='$mobile', email='$email' WHERE nid='$nid'";

if ($submit) {
    if ($name != "" && $mobile != "" && $nid != "" && $email != "") {
        session_start();
        if ($_SESSION['user_nid'] == $nid) {
            // query
            $data = mysqli_query($con, $sql);
    
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_mobile'] = $mobile;
    
            ?>
            <script>
                const em = document.getElementById('msg');
                em.innerHTML = "Successfully Updated...";
            </script>
            <META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/test/E-Ticketing/profile.php">
            <?php
        } else {
            ?>
            <script>
                const em = document.getElementById('msg');
                em.innerHTML = "You Can't Update Your NID NO..";
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