<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

$f_id = $_GET['fi'];

$sql = "DELETE FROM user_feedback WHERE feedback_id='$f_id'";
$data = mysqli_query($con, $sql);

if($data) {
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/test/E-Ticketing/messageList.php">
    <?php
} 

?>