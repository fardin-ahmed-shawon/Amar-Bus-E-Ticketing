<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

/* Table 2: bus_info */
$sql2 = "CREATE TABLE bus_info(
    operator VARCHAR(50),
    model VARCHAR(50),
    bType VARCHAR(10),
    class VARCHAR(20),
    coachNo VARCHAR(5),
    regNum INT(30) PRIMARY KEY,
    jFrom VARCHAR(25),
    jTo VARCHAR(25),
    depTime VARCHAR(10),
    arrTime VARCHAR(10),
    seats VARCHAR(15),
    price VARCHAR(5)
    )";
    $data2 = mysqli_query($con, $sql2);
    
    if ($data2) {
        echo "Table 2 Created";
    } else {
        echo "Table 2 Not Created";
    }

?>