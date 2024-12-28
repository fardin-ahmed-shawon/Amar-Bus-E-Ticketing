<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

/* Table 1: user_info */
$sql1 = "CREATE TABLE user_info(
nid INT(20) PRIMARY KEY,
name VARCHAR(50),
mobile VARCHAR(15),
email VARCHAR(50),
password VARCHAR(20)
)";
$data1 = mysqli_query($con, $sql1);

if ($data1) {
    echo "Table 1 Created";
} else {
    echo "Table 1 Not Created";
}

?>