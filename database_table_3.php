<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

/* Table 3: purchase_history */
$sql3 = "CREATE TABLE purchase_history(
    purchase_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    nid VARCHAR(20) NOT NULL,
    operator VARCHAR(50) NOT NULL,
    regNum INT(30) NOT NULL,
    journey_date DATE NOT NULL,
    price VARCHAR(5) NOT NULL,
    seat_no VARCHAR(5) NOT NULL
    )";
    $data3 = mysqli_query($con, $sql3);
    
    if ($data3) {
        echo "Table 3 Created";
    } else {
        echo "Table 3 Not Created";
    }

?>