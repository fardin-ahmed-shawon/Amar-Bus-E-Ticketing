<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

session_start();
$busRegNum = $_SESSION['busReg_Num'];
$date = $_SESSION['date'];


$sql = "SELECT seat_no FROM purchase_history WHERE regNum='$busRegNum' AND journey_date='$date'";
$result = $con->query($sql);

$soldSeats = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $soldSeats[] = $row['seat_no'];
    }
}

echo json_encode(['soldSeats' => $soldSeats]);
$con->close();
?>