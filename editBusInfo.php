<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css/busAdd.css">
    <style>
        .login-box {
            margin-bottom: 50px;
        }
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

<!-- START NAV AREA -->
<nav>
    <div class="nav-area">
        <div class="logo">
            <img src="img/logo.png" alt="LOGO">
        </div>
    </div>
</nav>
<!-- END NAV AREA -->

<h2 id="msg"></h2>
<section>
    <div class="container">
        <div class="login-box">
            <h1>Update Bus Information</h1>
            <form action="#" method="POST">
                <div class="col-2">
                    <label for="name">Bus Operator Name: </label>
                    <input name="name" class="input-gap" type="text" placeholder="Enter bus operator name" value="<?php echo $_GET['b_name']?>">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="model">Bus Model: </label>
                    <input name="model" class="input-gap" type="text" placeholder="Enter bus model" value="<?php echo $_GET['b_model']?>">
                </div>


                <div class="col-2">
                    <label for="type">Bus Type: </label>
                    <input name="type" class="input-gap" type="text" placeholder="Enter bus type" value="<?php echo $_GET['b_type']?>">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="class">Bus Class: </label>
                    <input name="class" class="input-gap" type="text" placeholder="Enter bus class" value="<?php echo $_GET['b_class']?>">
                </div>


                <div class="col-2">
                    <label for="coachNo">Coach No: </label>
                    <input name="coachNo" class="input-gap" type="text" placeholder="Enter coach no." value="<?php echo $_GET['b_coachNo']?>">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="model">Registration Number: </label>
                    <input name="regNum" class="input-gap" type="text" placeholder="Enter registration number" value="<?php echo $_GET['b_regNum']?>">
                </div>
                <?php
                session_start();
                $_SESSION['busRegN'] = $_GET['b_regNum'];
                ?>


                <div class="col-2">
                    <label for="from">From: </label>
                    <input name="from" class="input-gap" type="text" placeholder="From" value="<?php echo $_GET['b_from']?>">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="to">To: </label>
                    <input name="to" class="input-gap" type="text" placeholder="To" value="<?php echo $_GET['b_to'] ?>">
                </div>


                <div class="col-2">
                    <label for="depTime">Departure Time: </label>
                    <input name="depTime" class="input-gap" type="text" placeholder="Departure time" value="<?php echo $_GET['b_depTime']?>">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="arrTime">Arrival Time: </label>
                    <input name="arrTime" class="input-gap" type="text" placeholder="Arrival time" value="<?php echo $_GET['b_arrTime']?>">
                </div>


                <div class="col-2">
                    <label for="seats">Number of Seats: </label>
                    <input name="seats" class="input-gap" type="text" placeholder="Number of seats" value="<?php echo $_GET['b_seats']?>">
                </div>
                <div class="col-2 col-align-right">
                    <label class="right-lbl-tag" for="price">Ticket Price: </label>
                    <input name="price" class="input-gap" type="text" placeholder="Ticket price" value="<?php echo $_GET['b_price']?>">
                </div>

                <input name="submit" class="btn" type="submit" value="Update">
            </form>
        </div>
    </div>
</section>
    
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
$sql = "UPDATE bus_info SET operator='$name', model='$model', bType='$type', class='$class', coachNo='$coachNo', jFrom='$from', jTo='$to', depTime='$depTime', arrTime='$arrTime', seats='$seats', price='$price' WHERE regNum='$regNum'";

if ($submit) {
    if ($name != "" && $model != "" && $type != "" && $class != "" && $coachNo != "" && $regNum != "" && $from != "" && $to != "" && $depTime != "" && $arrTime != "" && $seats != "" && $price != "") {
        if ($regNum == $_SESSION['busRegN']) {
            mysqli_query($con, $sql);
            ?>
            <script>
                const em = document.getElementById('msg');
                em.innerHTML = "Information Updated...";
            </script>
            <META HTTP-EQUIV="Refresh" CONTENT="1; URL=busEditDelete.php">
            <?php
        } else {
            ?>
            <script>
                const em = document.getElementById('msg');
                em.innerHTML = "You Can't Update Registration Number..";
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

</body>
</html>