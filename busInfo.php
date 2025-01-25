<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->    
    <link rel="stylesheet" href="css/busInfo.css">
    <style>
        .msg-box {
            text-align: center;
            display: block;
        }
        .align {
            text-align: center;
        }
        @media only screen and (max-width: 740px) {
            .align {
                text-align: left;
            }
            .align-right-md {
                text-align: right;
            }
        }
        @media only screen and (max-width: 520px) {
            .col-3 {
                height: 70px;
            }
            .card {
                height: 510px;
            } 
        }
        @media only screen and (max-width: 420px) {
            .col-6 {
                height: 75px;
            }
            .card {
                height: 530px;
            }
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
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a class="active" href="busInfo.php">Bus Information</a></li>
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

<section>
    <div class="container">
    <!-- Card -->
    <?php
    error_reporting(0);
    // create connection
    $con = mysqli_connect("localhost", "root", "", "amarbus");

    // showing data
    $sql = "SELECT * FROM bus_info";
    $data = mysqli_query($con, $sql);
    $total = mysqli_num_rows($data);

    if ($total != 0) {
        while($result = mysqli_fetch_array($data)) {
            echo "
            <div class='card'>
                <div class='top-area'>
                    <div class='col-3'>
                        <div class='title'>operator</div>
                        $result[operator]
                    </div>
                    <div class='col-3 align-right-md'>
                        <div class='title'>model</div>
                        $result[model]
                    </div>
                    <div class='col-3 full-col'>
                        <div class='title'>class</div>
                        $result[class]
                    </div>
                </div>
                <br><hr>
                <div class='bottom-area'>
                    <div class='col-6'>
                        <div class='title'>type</div>
                        $result[bType]
                    </div>
                    <div class='col-6 align-right-md'>
                        <div class='title'>seats</div>
                        $result[seats]
                    </div>
                    <div class='col-6'>
                        <div class='title'>route</div>
                        $result[jFrom] - $result[jTo]
                    </div>
                    <div class='col-6 align-right-md align'>
                        <div class='title'>departure</div>
                        $result[depTime]
                    </div>
                    <div class='col-6 align'>
                        <div class='title'>arrival</div>
                        $result[arrTime]
                    </div>
                    <div class='col-6 align-right-md align'>
                        <div class='title'>ticket</div>
                        $result[price] Tk
                    </div>
                </div>
                <br><br><br>
            </div>        
            ";
        }
    } else {
        echo "<div class='card msg-box'>
                <h2>No Records Found!<h2>
            </div>";
    }

    ?>
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


</body>
</html>