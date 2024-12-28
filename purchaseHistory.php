<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->    
    <link rel="stylesheet" href="css/purchaseHistory.css">
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

<?php
// error_reporting(0);
?>
<section>
    <h1 style="margin-bottom: 0; padding: 20px">Purchase History</h1><hr>
    <div class="container">
        <div>
            <!-- Ticket List will print here -->
            <?php
                // create database connection
                $con = mysqli_connect("localhost", "root", "", "amarbus");

                $nid = $_SESSION['user_nid'];
                // SQL
                // $sql = "SELECT * FROM purchase_history WHERE nid='$nid'";
                $sql = "SELECT
                    purchase_history.regNum,
                    purchase_history.journey_date,
                    purchase_history.price,
                    purchase_history.seat_no,
                    bus_info.operator,
                    bus_info.model,
                    bus_info.class,
                    bus_info.bType,
                    bus_info.coachNo,
                    bus_info.jFrom,
                    bus_info.jTo,
                    bus_info.depTime,
                    bus_info.arrTime
                FROM
                    purchase_history
                JOIN
                    bus_info ON purchase_history.regNum = bus_info.regNum
                WHERE 
                    nid='$nid'
                ";
                
                $data = mysqli_query($con, $sql);
                $total = mysqli_num_rows($data);

                // Algorithm to sort out the specific ticket
                $seat_list = [];
                $reg_num;
                $date;
                $fare;

                $count = 0;
                $current_row = 0;

                if ($total != 0) {
                    while($result = mysqli_fetch_array($data)) {
                        $current_row++;
                        if ($count == 0) {
                            // purchase_history
                            $reg_num = $result['regNum'];
		                    $date = $result['journey_date'];
                            $fare = $result['price'];
		                    $seat_list[] = $result['seat_no'];

                            // bus_info
                            $operator = $result['operator'];
                            $model = $result['model'];
                            $class = $result['class'];
                            $bType = $result['bType'];
                            $coachNo = $result['coachNo'];
                            $jFrom = $result['jFrom'];
                            $jTo = $result['jTo'];
                            $depTime = $result['depTime'];
                            $arrTime = $result['arrTime'];

		                    $count++;
                        } else if ($reg_num == $result['regNum'] && $date == $result['journey_date'] && $count != 0)  {
		                    $seat_list[] = $result['seat_no'];
                        } else {
                            echo "
                                <div class='card'>
                                    <h1>$operator</h1>
                                    <h2>$model - $class</h2>
                                    <h2>$bType, Coach No. #$coachNo</h2>
                                    <br><hr><br>

                                    <div class='row'>
                                        <div class='left full-area'>
                                            <span>Passenger Name:</span>
                                            <h4>"; 
                                            echo $_SESSION['user_name'];
                                            echo "</h4>
                                            <br>
                                            <span>Passenger Contact:</span>
                                            <h4>"; 
                                            echo $_SESSION['user_mobile'];
                                            echo "</h4>
                                            <br>
                                            <span>Journey Date:</span>
                                            <h4>$date</h4>
                                            <br>
                                            </div>
                                        <div class='right full-area'>
                                            <div class='row'>
                                                <div class='left'>
                                                    <span>FARE</span>
                                                    <h4><span id='fare'>";
                                                    echo $fare*count($seat_list);
                                                    echo "</span> Tk</h4>
                                                </div>
                                                <div class='right'>
                                                    <span>SEATS</span>
                                                    <h4 id='seat_no'>"; 
                                                    for ($i = 0; $i < count($seat_list); $i++) {
                                                        if ($i == 0) {
                                                            echo $seat_list[$i];
                                                        } else {
                                                            echo ", ".$seat_list[$i];
                                                        }
                                                    }
                                                    echo"</h4>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class='row'>
                                                <div class='left'><br>
                                                    <span>Departure</span><br><br>
                                                    <h3 style='font-weight: 400;'>$jFrom</h3>
                                                    <h4>$depTime</h4>
                                                </div>
                                                <div class='right'><br>
                                                    <span>Arrival</span><br><br>
                                                    <h3 style='font-weight: 400;'>$jTo</h3>
                                                    <h4>$arrTime</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href='#'>
                                        <button class='btn'>
                                        Print Your Ticket
                                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMdJREFUSEvVlv0VgjAMxO820U1kFCbRUXQS2UQ2iYRneZhnbYhUsX+398vlC4jKh5X1kQWIiCyBk3yp9XtALrLkLjkNO/gvwFDXE4DjkuKauz2Ay1Bv1RnPVOQVxOesM8nWAm4AdgAakl3EhYjoe9XpSe4tYOz7UlFt90ypeMyB7ap5irYFyKVwNQcfA6K7yO3ga4BSV9mI3zm4AjjY3HoB5l1HsrFzoOK6Jp4gAYCuizYNa/F74AWE17V3ZWwP4I28dK/6X8Udo7GoGWZtncAAAAAASUVORK5CYII='/>
                                        </button>
                                    </a>
                                </div>
                            ";
                            $seat_list = [];

                            // purchase_history
                            $reg_num = $result['regNum'];
		                    $date = $result['journey_date'];
                            $fare = $result['price'];
		                    $seat_list[] = $result['seat_no'];

                            // bus_info
                            $operator = $result['operator'];
                            $model = $result['model'];
                            $class = $result['class'];
                            $bType = $result['bType'];
                            $coachNo = $result['coachNo'];
                            $jFrom = $result['jFrom'];
                            $jTo = $result['jTo'];
                            $depTime = $result['depTime'];
                            $arrTime = $result['arrTime'];
                        }
                        // Printing the last ticket
                        if ($current_row == $total) {
                            echo "
                                <div class='card'>
                                    <h1>$operator</h1>
                                    <h2>$model - $class</h2>
                                    <h2>$bType, Coach No. #$coachNo</h2>
                                    <br><hr><br>

                                    <div class='row'>
                                        <div class='left full-area'>
                                            <span>Passenger Name:</span>
                                            <h4>"; 
                                            echo $_SESSION['user_name'];
                                            echo "</h4>
                                            <br>
                                            <span>Passenger Contact:</span>
                                            <h4>"; 
                                            echo $_SESSION['user_mobile'];
                                            echo "</h4>
                                            <br>
                                            <span>Journey Date:</span>
                                            <h4>$date</h4>
                                            <br>
                                            </div>
                                        <div class='right full-area'>
                                            <div class='row'>
                                                <div class='left'>
                                                    <span>FARE</span>
                                                    <h4><span id='fare'>";
                                                    echo $fare*count($seat_list);
                                                    echo "</span> Tk</h4>
                                                </div>
                                                <div class='right'>
                                                    <span>SEATS</span>
                                                    <h4 id='seat_no'>"; 
                                                    for ($i = 0; $i < count($seat_list); $i++) {
                                                        if ($i == 0) {
                                                            echo $seat_list[$i];
                                                        } else {
                                                            echo ", ".$seat_list[$i];
                                                        }
                                                    }
                                                    echo"</h4>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class='row'>
                                                <div class='left'><br>
                                                    <span>Departure</span><br><br>
                                                    <h3 style='font-weight: 400;'>$jFrom</h3>
                                                    <h4>$depTime</h4>
                                                </div>
                                                <div class='right'><br>
                                                    <span>Arrival</span><br><br>
                                                    <h3 style='font-weight: 400;'>$jTo</h3>
                                                    <h4>$arrTime</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href='#'>
                                        <button class='btn'>
                                        Print Your Ticket
                                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMdJREFUSEvVlv0VgjAMxO820U1kFCbRUXQS2UQ2iYRneZhnbYhUsX+398vlC4jKh5X1kQWIiCyBk3yp9XtALrLkLjkNO/gvwFDXE4DjkuKauz2Ay1Bv1RnPVOQVxOesM8nWAm4AdgAakl3EhYjoe9XpSe4tYOz7UlFt90ypeMyB7ap5irYFyKVwNQcfA6K7yO3ga4BSV9mI3zm4AjjY3HoB5l1HsrFzoOK6Jp4gAYCuizYNa/F74AWE17V3ZWwP4I28dK/6X8Udo7GoGWZtncAAAAAASUVORK5CYII='/>
                                        </button>
                                    </a>
                                </div>
                            ";
                        }
                    }
                } else {
                    echo "<div class='card'><h2>No Purchase History Was Found!</h2></div>";
                }

            ?>
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