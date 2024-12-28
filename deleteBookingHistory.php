<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

$purchase_id = $_GET['p_i'];

$sql = "DELETE FROM purchase_history WHERE purchase_id='$purchase_id'";

$data = mysqli_query($con, $sql);

if ($data) {
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/test/E-Ticketing/bookingHistory.php">
    <?php
}

?>