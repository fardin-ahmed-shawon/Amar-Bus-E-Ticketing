<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/profile.css">
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
    <div class="contents">
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
</div>
<!-- End Sidebar -->

<!-- User Information -->
<section>
    <div class="card" style="overflow-x: auto;">
        <h1>Profile</h1>
        <div style="overflow-x: auto;">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>
                        <?php
                        echo $_SESSION['user_name'];
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                        <?php
                        echo $_SESSION['user_email'];
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile Number</td>
                        <td>:</td>
                        <td>
                        <?php
                        echo $_SESSION['user_mobile'];
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>NID No.</td>
                        <td>:</td>
                        <td>
                        <?php
                        echo $_SESSION['user_nid'];
                        ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div>
            <a href="editUserInfo.php">
                <button class="btn">
                    Edit Information
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQxJREFUSEu1lYsNwyAMRH2btJsko3SSjtJukoySTVwdgorwM6EFKYpEnHv2YQAyeWCyvvwFoKo3EVkAvNOETwBVXUTkJSL8oTVWADsDVHWjuA8+RITf+HYjBcTBNUBJPAgysQPAvQZQRwVM66LMnaC3iQkS8gh2pRV0AWq2RPPjgDhzb4OzxT9cizGLvAVsgK9IYgt5J/HSIhctKomHRUzXwmrTDHBVnK0eWtisoCbemKd9W9yFzS4qlW9UlDlgAU4/tMT9rh4HWOI/AZLOyFox6qixCiJAVXyogqt3hapeq2AGoOe4trg7gLV2XHOjPKMLxBJLv/PQ40nqLqNsJ19V64k3L5YekVbMdMAH5/PsGSTMuK8AAAAASUVORK5CYII="/>
                </button>
            </a>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<script>
    var ind = localStorage.getItem('sidebar-show');
    if (ind != 1) {
        window.location.href = "http://localhost/test/E-Ticketing/login.php";
    }

    function clearLocalStorage() {
        localStorage.clear();
        window.location.href = "http://localhost/test/E-Ticketing/home.php";
    }
</script>
<script src="main.js"></script>
</body>
</html>