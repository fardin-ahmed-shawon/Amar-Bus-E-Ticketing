<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css/busAdd.css">
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

<!-- START NAV AREA -->
<nav>
    <div class="nav-area">
        <div class="logo">
        <a href="adminHome.php"><img src="img/logo.png" alt="LOGO"></a>
        </div>
    </div>
</nav>
<!-- END NAV AREA -->

<h2 id="msg"></h2>
<section>
    <div class="container">
        <div class="login-box">
            <h1>Add Bus</h1>
            <form action="#" method="POST">
                <div class="col-2">
                    <input name="name" class="input-gap" type="text" placeholder="Enter bus operator name">
                </div>
                <div class="col-2 col-align-right">
                    <input name="model" class="input-gap" type="text" placeholder="Enter bus model">
                </div>


                <div class="col-2">
                    <input name="type" class="input-gap" type="text" placeholder="Enter bus type">
                </div>
                <div class="col-2 col-align-right">
                    <input name="class" class="input-gap" type="text" placeholder="Enter bus class">
                </div>

                <div class="col-2">
                    <input name="coachNo" class="input-gap" type="text" placeholder="Enter coach no.">
                </div>
                <div class="col-2 col-align-right">
                    <input name="regNum" class="input-gap" type="text" placeholder="Enter registration number">
                </div>


                <div class="col-2">
                    <input name="from" class="input-gap" type="text" placeholder="From">
                </div>
                <div class="col-2 col-align-right">
                    <input name="to" class="input-gap" type="text" placeholder="To">
                </div>


                <div class="col-2">
                    <input name="depTime" class="input-gap" type="text" placeholder="Departure time">
                </div>
                <div class="col-2 col-align-right">
                    <input name="arrTime" class="input-gap" type="text" placeholder="Arrival time">
                </div>


                <div class="col-2">
                    <input name="seats" class="input-gap" type="text" placeholder="Number of seats">
                </div>
                <div class="col-2 col-align-right">
                    <input name="price" class="input-gap" type="text" placeholder="Ticket price">
                </div>

                <input name="submit" class="btn" type="submit" value="Submit">
            </form>
        </div>
    </div>
</section>
    
<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<?php
error_reporting(0);
// database connection
$con = mysqli_connect("localhost", "root","", "amarbus");

// input's value
$name = $_POST['name'];
$model = $_POST['model'];
$type = $_POST['type'];
$class = $_POST['class'];
$coachNo = $_POST['coachNo'];
$regNum = $_POST['regNum'];
$from = $_POST['from'];
$to = $_POST['to'];
$depTime = $_POST['depTime'];
$arrTime = $_POST['arrTime'];
$seats = $_POST['seats'];
$price = $_POST['price'];

$submit = $_POST['submit'];

// insert data into 'bus_info' table
$sql = "INSERT INTO bus_info values('$name', '$model', '$type', '$class', '$coachNo', '$regNum', '$from', '$to', '$depTime', '$arrTime', '$seats', '$price')";

if ($submit) {
    if ($name != "" && $model != "" && $type != "" && $class != "" && $coachNo != "" && $regNum != "" && $from != "" && $to != "" && $depTime != "" && $arrTime != "" && $seats != "" && $price != "") {
        mysqli_query($con, $sql);
        ?>
        <script>
            const em = document.getElementById('msg');
            em.innerHTML = "Bus Registration Successful...";
        </script>
        <META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/test/E-Ticketing/adminHome.php">
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