<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->    
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

<!-- START NAV AREA -->
<nav>
    <div class="nav-area">
        <div class="logo">
            <img src="img/logo.png" alt="LOGO">
        </div>
        <div class="list">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="busInfo.php">Bus Information</a></li>
                <li><a class="active" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="profile">
            <img onclick="profile_open()" src="img/profile.png" alt="#">
        </div>
        <div class="mobile-menu-btn">
            <i onclick="profile_open()" class="fas fa-bars"></i>
        </div>
    </div>
</nav>
<!-- END NAV AREA -->

<!-- Start Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="close-btn">
        <i onclick="profile_close()" class="fa-sharp fa-solid fa-xmark"></i>
    </div>
    <img src="img/profile.png" alt="#">
    <br><br>
    <!-- Contents -->
    <div id="contents" class="contents" style="display: none">
        <h2><?php
        session_start();
        echo $_SESSION['user_name'];
        ?></h2>
        <p>
            <img class="svg" src="svg/email.svg"> <?php
        echo $_SESSION['user_email'];
        ?>
        </p>
        <p>
            <img class="svg" src="svg/phone.svg"> <?php
        echo $_SESSION['user_mobile'];
        ?>
        </p>
        <p>
            <img class="svg" src="svg/nid.svg"> <?php
        echo $_SESSION['user_nid'];
        ?>
        </p>

        <br><hr><br>

        <a href="profile.php">
            <button><img class="svg" src="svg/profile.svg">Profile</button>
        </a>

        <div class="pages-mobile">
            <a href="home.php">
                <button><img class="svg" src="svg/home.svg">Home</button>
            </a>
            <a href="login.php">
                <button><img class="svg" src="svg/login.svg">Login</button>
            </a>
            <a href="register.php">
                <button><img class="svg svg-sm" src="svg/user-add.svg">Register</button>
            </a>
            <a href="busInfo.php">
                <button><img class="svg svg-sm" src="svg/bus.svg">Bus Information</button>
            </a>
            <a href="contact.php">
                <button><img class="svg" src="svg/contact.svg">Contact Us</button>
            </a>
        </div>

        <a href="purchaseHistory.php">
            <button><img class="svg" src="svg/history.svg">Purchase History</button>
        </a>
        <a href="updatePass.php">
            <button><img class="svg" src="svg/password.svg">Update Password</button>
        </a>
        <a href="#">
            <button onclick="clearLocalStorage()">
                <img class="svg" src="svg/logout.svg">
                Logout
            </button>
        </a>
    </div>

    <!-- 2 -->
    <div id="contents-2" class="contents-2" style="display: block">
        <h2>You are not logged in!</h2>

        <br><hr><br>

        <div class="pages-mobile">
            <a href="home.php">
                <button><img class="svg" src="svg/home.svg">Home</button>
            </a>
            <a href="busInfo.php">
                <button><img class="svg" src="svg/bus.svg">Bus Information</button>
            </a>
            <a href="contact.php">
                <button><img class="svg" src="svg/contact.svg">Contact Us</button>
            </a>
        </div>
        <a href="login.php">
            <button><img class="svg" src="svg/login.svg">Login</button>
        </a>
        <a href="register.php">
            <button><img class="svg" src="svg/user-add.svg">Register</button>
        </a>

    </div>

</div>
<!-- End Sidebar -->

<section>
    <div class="container">
        <div class="login-box">
            <h1>Get In Touch</h1>
            <form action="#" method="POST">

                <div class="col-2">
                    <input name="fName" class="input-gap" type="text" placeholder="Enter your first name" required>
                </div>
                <div class="col-2 col-align-right">
                    <input name="lName" class="input-gap" type="text" placeholder="Enter your last name" required>
                </div>


                <div>
                    <input name="email" type="email" placeholder="Enter your email" required>
                </div>
                <div>
                    <textarea name="msg" placeholder="Message" rows="6"></textarea>
                </div>

                <input name="submit" class="btn" type="submit" value="Submit" required>
            </form>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<script>
    const contents = document.getElementById('contents');
    const contents2 = document.getElementById('contents-2');

    var ind = localStorage.getItem('sidebar-show');
    if (ind == 1) {
        contents.style.display = 'block';
        contents2.style.display = 'none';
    }

    function clearLocalStorage() {
        localStorage.clear();
        window.location.href = "home.php";
    }
</script>
<script src="main.js"></script>

<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "amarbus");

$nid = $_SESSION['user_nid'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$submit = $_POST['submit'];

$sql = "INSERT INTO user_feedback (nid, firstName, lastName, email, userMessage) VALUES ('$nid', '$fName', '$lName', '$email', '$msg')";

if ($submit) {
    mysqli_query($con, $sql);
}
?>

</body>
</html>

