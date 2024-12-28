<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css//bookingHistory.css">
    <style>
        a {
            text-decoration: none;
        }
        .table-area {
            overflow-x: auto;
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
<section>
    <div class="card">
        <h1>Booking History</h1><hr><br><br>
        <div class="table-area">
        <table class="table">
                <tbody>
                    <tr>
                        <th>Passenger Name</th>
                        <th>Phone Number</th>
                        <th>NID No</th>
                        <th>Bus Operator Name</th>
                        <th>Bus Registration No</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Journey Date</th>
                        <th>Fare</th>
                        <th>Seat No</th>
                        <th style='text-align: center'>Action</th>
                    </tr>
                    <?php
                    error_reporting(0);
                    $con = mysqli_connect("localhost", "root", "", "amarbus");

                    // SQL join
                    $sql = "SELECT 
                        user_info.name, 
                        user_info.nid,
                        user_info.mobile, 
                        bus_info.operator, 
                        bus_info.regNum, 
                        bus_info.jFrom, 
                        bus_info.jTo, 
                        purchase_history.journey_date, 
                        purchase_history.price, 
                        purchase_history.seat_no,
                        purchase_history.purchase_id 
                    FROM 
                        user_info 
                    JOIN 
                        purchase_history ON purchase_history.nid = user_info.nid 
                    JOIN 
                        bus_info ON purchase_history.regNum = bus_info.regNum;
                    ";
                    $data = mysqli_query($con, $sql);
                    $total = mysqli_num_rows($data);

                    if ($total != 0) {
                        while($result = mysqli_fetch_array($data)) {
                            echo "
                                <tr>
                                    <td>$result[name]</td>
                                    <td>$result[mobile]</td>
                                    <td>$result[nid]</td>
                                    <td>$result[operator]</td>
                                    <td>$result[regNum]</td>
                                    <td>$result[jFrom]</td>
                                    <td>$result[jTo]</td>
                                    <td>$result[journey_date]</td>
                                    <td>$result[price]</td>
                                    <td>$result[seat_no]</td>
                                    <td style='text-align: center'>
                                        <a onclick='return checkDelete()' class='btn' href='deleteBookingHistory.php?p_i=$result[purchase_id]'>Delete</a>
                                    </td>
                                </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<script>
    function checkDelete() {
        return confirm('Are you sure you want to delete this data?');
    }
</script>

</body>
</html>