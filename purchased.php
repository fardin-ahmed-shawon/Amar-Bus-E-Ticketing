<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

$data = json_decode(file_get_contents("php://input"), true);
$seats = $data['seats'];

session_start();
$passenger_name = $_SESSION['user_name'];
$passenger_nid = $_SESSION['user_nid'];
$bus_name = $_SESSION['b_n'];
$bus_regNum = $_SESSION['busReg_Num'];
$journey_date = $_SESSION['date'];
$price = $_SESSION['t_p'];

foreach ($seats as $seat) {
    $sql = "INSERT INTO purchase_history (name, nid, operator, regNum, journey_date, price, seat_no) VALUES ('$passenger_name', '$passenger_nid', '$bus_name', '$bus_regNum', '$journey_date', '$price', '$seat')";
    mysqli_query($con, $sql);
}


echo json_encode(['success' => true]);
$con->close();
?>
