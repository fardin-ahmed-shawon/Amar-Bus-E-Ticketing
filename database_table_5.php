<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

$sql5 = "CREATE TABLE admin_info(
username VARCHAR(50) PRIMARY KEY,
mobile VARCHAR(15),
email VARCHAR(50),
password VARCHAR(20)
)";

$data5 = mysqli_query($con, $sql5);

if ($data5) {
    echo "Table 5 Created";
} else {
    echo "Table 5 Not Created";
}

?>