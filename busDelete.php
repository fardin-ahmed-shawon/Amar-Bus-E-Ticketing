<?php
error_reporting(0);

// Create database connection
$con = mysqli_connect("localhost","root","","amarbus");

$bus_reg_num = $_GET['b_regNum'];

// SQL to delete
$sql = "DELETE FROM bus_info WHERE regNum='$bus_reg_num'";

$data = mysqli_query($con, $sql);

if ($data) {
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/test/E-Ticketing/busEditDelete.php">
    <?php
}

?>