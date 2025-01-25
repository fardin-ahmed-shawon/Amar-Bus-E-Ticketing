<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->    
    <link rel="stylesheet" href="css/booking.css">
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

<section>
    <div class="container">
        <div class="card">
            <h1><?php echo $_SESSION['b_n']?></h1>
            <h2><?php echo $_SESSION['b_m']?></h2>
            <h2><?php echo $_SESSION['b_t']?>, Coach No. #<?php echo $_SESSION['c_n']?></h2>
            <br><br>

            <span>Passenger Name:</span>
            <h4><?php echo $_SESSION['user_name'];?></h4>
            <br>
            <span>Passenger Contact:</span>
            <h4><?php echo $_SESSION['user_mobile'];?></h4>
            <br>
            <span>Journey Date:</span>
            <h4><?php echo $_SESSION['date']?></h4>
            <br>

            <div class="row">
                <div class="left">
                    <span>FARE</span>
                    <h4><span id="fare"></span> Tk</h4>
                </div>
                <div class="right">
                    <span>SEATS</span>
                    <h4 id="total-seats"></h4>
                </div>
            </div>
            <br><br><br><hr><br>

            <div class="row">
                <div class="left">
                    <span>Departure</span><br><br>
                    <h3 style="font-weight: 400;"><?php echo $_SESSION['from']?></h3>
                    <h4><?php echo $_SESSION['d_t']?></h4>
                    <!-- <h4 style="font-weight: 500;">Wed, 20th April</h4> -->
                </div>
                <div class="right">
                    <span>Arrival</span><br><br>
                    <h3 style="font-weight: 400;"><?php echo $_SESSION['to']?></h3>
                    <h4><?php echo $_SESSION['a_t']?></h4>
                    <!-- <h4 style="font-weight: 500;">Wed, 20th April</h4> -->
                </div>
            </div>
            <button onclick="purchase()" class="btn">Confirm</button>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>
    
<script>
    var ind = localStorage.getItem('sidebar-show');
    if (ind != 1) {
        window.location.href = "login.php";
    }
    
    function clearLocalStorage() {
        localStorage.clear();
        window.location.href = "home.php";
    }

    // Get total ticket and price value
    var total_ticket = localStorage.getItem('totalTicket');
    var total_price = localStorage.getItem('totalPrice');

    // Select DOM to update value dynamically
    var fare = document.getElementById('fare');
    var total_seats = document.getElementById('total-seats');

    fare.innerText = total_price;
    // total_seats.innerText = total_ticket;

    // Get 'seat_list' array's data(seat Selection page) and print 
    var seatList = JSON.parse(localStorage.getItem('seat_List'));
    for(i = 0; i < seatList.length; i++) {
        if (i == 0) {
            total_seats.innerText += (seatList[i]);
        } else {
            total_seats.innerText += ', '+(seatList[i]);
        }
    }

    // Send Selected Seat data to the purchased.php
    function purchase() {
        fetch('purchased.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ seats: seatList })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Seats booked successfully!');
                        window.location.href = "home.php";
                    } else {
                        alert('Failed to book seats.');
                    }
                });
    }



</script>
<script src="main.js"></script>
<?php
// Set from, to and journey date to see purchase history perfectly
$_SESSION['prev_from'] = $_SESSION['from'];
$_SESSION['prev_to'] = $_SESSION['to'];
$_SESSION['prev_journeyDate'] = $_SESSION['date'];

?>
</body>
</html>