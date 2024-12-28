<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/seatSelection.css">
    <style>
        #incorrect-msg {
            color: red;
            background-color: #EFF5F2;
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

<?php
error_reporting(0);
?>
<h2 id="incorrect-msg"></h2>
<section>
    <div class="container">
        <div class="col-2 information-area">
            <h1>COACH INFORMATION</h1><br>
            <h2><?php echo $_GET['bn']?></h2>
            <h3 id="bus-class" style="font-weight: bold"><?php echo $_GET['bc']?></h3>
            <br>
            <h3><?php echo $_GET['bm']?>, <?php echo $_GET['bt']?>, Coach No. #<?php echo $_GET['cn']?></h3>
            <h3 style="font-weight: 600">Fare: <span id="ticketPrice"><?php echo $_GET['tp']?></span> Tk</h3>
            <br>
            <h3 style="font-weight: 700">Journey Date: <?php echo $_SESSION['date']?></h3>
            <br>
            <h5>Departure</h5>
            <h3><?php echo $_GET['jf']?></h3>
            <h4><?php echo $_GET['dt']?></h4>
            <br>
            <hr>
            <br>
            <h5>Arrival</h5>
            <h3><?php echo $_GET['jt']?></h3>
            <h4><?php echo $_GET['at']?></h4>
        </div>
        <!-- Seats -->   
        <div class="col-2 seat-selection-area">
           
            <h1>Choose Your Seat</h1><hr><br>
            <!-- Top area -->
            <div class="selection-indicator">
                <div class="col-3">
                    <div class="type-1"></div>
                    <span>Available</span>
                </div>
                <div class="col-3">
                    <div class="type-2"></div>
                    <span>Sold</span>
                </div>
                <div class="col-3">
                    <div class="type-3"></div>
                    <span>Selected</span>
                </div>
            </div>
            <!-- Selection Area -->

            <!-- For Economy Class -->
                <div class="card">
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="A1" class="seat">A1</div>
                            <div data-seat-id="A2" class="seat">A2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="A3" class="seat">A3</div>
                            <div data-seat-id="A4" class="seat">A4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="B1" class="seat">B1</div>
                            <div data-seat-id="B2" class="seat">B2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="B3" class="seat">B3</div>
                            <div data-seat-id="B4" class="seat">B4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="C1" class="seat">C1</div>
                            <div data-seat-id="C2" class="seat">C2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="C3" class="seat">C3</div>
                            <div data-seat-id="C4" class="seat">C4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="D1" class="seat">D1</div>
                            <div data-seat-id="D2" class="seat">D2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="D3" class="seat">D3</div>
                            <div data-seat-id="D4" class="seat">D4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="E1" class="seat">E1</div>
                            <div data-seat-id="E2" class="seat">E2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="E3" class="seat">E3</div>
                            <div data-seat-id="E4" class="seat">E4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="F1" class="seat">F1</div>
                            <div data-seat-id="F2" class="seat">F2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="F3" class="seat">F3</div>
                            <div data-seat-id="F4" class="seat">F4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="G1" class="seat">G1</div>
                            <div data-seat-id="G2" class="seat">G2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="G3" class="seat">G3</div>
                            <div data-seat-id="G4" class="seat">G4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="H1" class="seat">H1</div>
                            <div data-seat-id="H2" class="seat">H2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="H3" class="seat">H3</div>
                            <div data-seat-id="H4" class="seat">H4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="I1" class="seat">I1</div>
                            <div data-seat-id="I2" class="seat">I2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="I3" class="seat">I3</div>
                            <div data-seat-id="I4" class="seat">I4</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div data-seat-id="J1" class="seat">J1</div>
                            <div data-seat-id="J2" class="seat">J2</div>
                        </div>
                        <div class="col-2">
                            <div data-seat-id="J3" class="seat">J3</div>
                            <div data-seat-id="J4" class="seat">J4</div>
                        </div>
                    </div>
                </div>
            <!-- For Economy Class -->

            <!-- Bottom Area -->
            <div class="bottom-area">
                <div class="left-p"><p><span id="count">0</span> seat(s) selected</p></div>
                <div class="right-p"><p><span id="total">0</span> Tk</p></div>
            </div>
            <a href='#'>
                <button onclick='checkSelection()' class='btn'>Continue</button>
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


    // Seat selection
    count = document.getElementById('count');
    total = document.getElementById('total');
    ticket_price = document.getElementById('ticketPrice');
    seat_container = document.querySelector('.card');
    available_seats = document.querySelectorAll('.seat:not(.sold)');

    unit_price = +ticket_price.innerText;

    let seat_list = [];
    
    function update_count_total() {
        selected_seats = document.querySelectorAll(".card .selected");
        count.innerText = selected_seats.length;
        total.innerText = selected_seats.length * unit_price;

        // Set count and price values into the local storage
        var total_ticket = count.innerText;
        var total_price = total.innerText;
        localStorage.setItem('totalTicket', total_ticket);
        localStorage.setItem('totalPrice', total_price);
    }

    seat_container.addEventListener('click', function(e) {
        if (e.target.classList.contains('seat') && !e.target.classList.contains('sold')) {
            e.target.classList.toggle('selected');
            update_count_total();

            // insert value into the 'seat_list' array
            seat_list.push(e.target.innerText);

            if (seat_list[seat_list.length-1] == seat_list[seat_list.length-2]) {
                seat_list.pop();
                seat_list.pop();
            }
        }
    });

    // check selection(minimum 1 seat will be selected)
    var msgBox = document.getElementById('incorrect-msg');
    function checkSelection() {
        if (count.innerText >= 1) {
            window.location.href = "http://localhost/test/E-Ticketing/booking.php";

            // Set 'seat_list' array into the local storage
            localStorage.setItem('seat_List', JSON.stringify(seat_list));
        } else {
            var msg_box = document.getElementById('incorrect-msg');
            msg_box.innerText = "You have to select at least 1 seat!";
        }
    }

    // Fetch Sold Data
    fetch('get_seats.php')
            .then(response => response.json())
            .then(data => {
                data.soldSeats.forEach(seatId => {
                    const seat = document.querySelector(`[data-seat-id="${seatId}"]`);
                    if (seat) {
                        seat.classList.add('sold');
                    }
                });
            });


    
</script>
<script src="main.js"></script>

</body>
</html>

<?php
error_reporting(0);
$_SESSION['b_n'] = $_GET['bn'];
$_SESSION['b_m'] = $_GET['bm'];
$_SESSION['b_t'] = $_GET['bt'];
$_SESSION['c_n'] = $_GET['cn'];
$_SESSION['d_t'] = $_GET['dt'];
$_SESSION['a_t'] = $_GET['at'];
$_SESSION['t_p'] = $_GET['tp'];
$_SESSION['busReg_Num'] = $_GET['brn'];

?>