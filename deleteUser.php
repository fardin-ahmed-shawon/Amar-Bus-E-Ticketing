<?php
// database connection
include 'dbConnection.php';

$user_id = $_GET['ui'];

$sql = "DELETE FROM user_info WHERE nid='$user_id'";
$data = mysqli_query($con, $sql);

if ($data) {
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=userList.php">
    <?php
}

?>