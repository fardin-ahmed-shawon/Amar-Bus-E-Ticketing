<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/home.css">
    <style>
        #msg {
            background-color: white;
            font-size: 2rem;
            text-align: center; 
            display: block; 
            font-weight: 400;
        }
    </style> 
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
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="busInfo.php">Bus Information</a></li>
                <li><a href="contact.php">Contact Us</a></li>
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

<h2 id="msg"></h2>
<section>
    <div class="container">
        <div class="background-img">
            <div class="dark-overlay">
                <div class="card">
                    <form action="#" method="POST">
                        <div class="col-3">
                            <label>From</label><br>
                            <input name="from" class="input-gap" type="text" placeholder="From Station" required>
                        </div>
                        <div class="col-3">
                            <label>To</label><br>
                            <input name="to" class="input-gap" type="text" placeholder="To Station" required>
                        </div>
                        <div class="col-3">
                            <label>Journey Date</label><br>
                            <input type="date" id="journey-date" name="date" required>
                        </div>
                        <input name="submit" class="btn" type="submit" value="Search Buses">
                    </form>
                </div>
            </div>
        </div>
        <div class="direction">

            <div class="col-3">
                <div class="col-2 col-align-right">
                    <img src="img/icon1.png" alt="ICON1">
                </div>
                <div class="col-2">
                    <h2>Search</h2>
                    <p>Choose your origin, destination, journey dates and search for buses</p>
                </div>
            </div>

            <div class="col-3">
                <div class="col-2 col-align-right">
                    <img src="img/icon2.png" alt="ICON1">
                </div>
                <div class="col-2">
                    <h2>Select</h2>
                    <p>Select your desired trip and choose your seats</p>
                </div>
            </div>

            <div class="col-3">
                <div class="col-2 col-align-right">
                    <img src="img/icon3.png" alt="ICON1">
                </div>
                <div class="col-2">
                    <h2>Pay</h2>
                    <p>Pay by bank card or mobile banking</p>
                </div>
            </div>
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
        window.location.href = "http://localhost/test/E-Ticketing/home.php";
    }
</script>
<script src="main.js"></script>

<?php
error_reporting(0);
// data collecting from search box
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];
$submit = $_POST['submit'];

// creating session variable for using these data into another pages
session_start();

$_SESSION['from'] = $from;
$_SESSION['to'] = $to;
$_SESSION['date'] = $date;

if ($submit) {
    if ($from != "" && $to != "" && $date != "") {
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=http://localhost/test/E-Ticketing/tripSelection.php?">
        <?php
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

</body>
</html>