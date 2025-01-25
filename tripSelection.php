<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/tripSelection.css">
    <style>
        .msg-box {
            text-align: center;
            display: block;
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

<section>
    <div class="container">
        <div class="card-2">
            <div class="col-3">
                <h4>Route:</h4>
                <h2><?php echo $_SESSION['from']?> - <?php echo $_SESSION['to']?></h2>
            </div>
            <div class="col-3">
                <h4>Date:</h4>
                <h2><?php echo $_SESSION['date']?></h2>
            </div>
            <div class="col-3 btn-right-align">
                <a href="home.php">
                    <button class="btn btn-2">Modify Search</button>
                </a>
            </div>
        </div>
        <div class="mdf-btn">
            <a href="home.php">
                <button class="btn btn-2">Modify Search</button>
            </a>
        </div>
        <!-- Search Results -->
        <!-- START -->
        <?php
        error_reporting(0);
        // create connection
        $con = mysqli_connect("localhost", "root", "", "amarbus");

        // data collecting from home page
        $from = $_SESSION['from'];
        $to = $_SESSION['to'];
        $date = $_SESSION['date'];

        // data collecting from the database
        $sql = "SELECT * FROM bus_info WHERE jFrom='$from' AND jTo='$to'";
        $data = mysqli_query($con, $sql);
        $total = mysqli_num_rows($data);

        if ($total != 0) {
            while($result = mysqli_fetch_array($data)) {
                // other's bus info
                echo "
                <div class='card'>
                    <div class='col-5'>
                        <h3>$result[operator]</h3>
                        <p>$result[model], $result[bType]</p>
                        <p>$result[class]</p>
                    </div>
                    <div class='col-5'>
                        <h3>$result[depTime]</h3>
                        <p>$result[jFrom]</p>
                    </div>
                    <div class='col-5'>
                        <h3>$result[arrTime]</h3>
                        <p>$result[jTo]</p>
                    </div>
                    <div class='col-5'>
                        <h3>$result[price] Tk</h3>
                        <p><span>$result[seats]</span> Seats</p>
                    </div>
                    <div class='col-5 btn-align'>
                        <a href='seatSelection.php?
                        bn=$result[operator]
                        &bm=$result[model]
                        &bt=$result[bType]
                        &bc=$result[class]
                        &cn=$result[coachNo]
                        &brn=$result[regNum]
                        &jf=$result[jFrom]
                        &jt=$result[jTo]
                        &tp=$result[price]
                        &dt=$result[depTime]
                        &at=$result[arrTime]
                        '><button onclick='checkLogin()' class='btn'>Book Ticket</button></a>
                    </div>
                </div>
                <div class='btn-btm'>
                    <a href='#'><button onclick='checkLogin()' class='btn'>Book Ticket</button>
                    </a>
                </div>
                ";
            }
        } else {
            echo "<div class='card msg-box'>
                <h2>No Search Results Found!<h2>
            </div>";
        }
        ?>
        <!-- END -->
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
    function checkLogin() {
        if (ind == 1) {
            window.location.href = "seatSelection.php";
        } else {
            window.location.href = "login.php";
        }
    }

    function clearLocalStorage() {
        localStorage.clear();
        window.location.href = "home.php";
    }

</script>
<script src="main.js"></script>

</body>
</html>