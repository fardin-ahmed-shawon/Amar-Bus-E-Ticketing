<?php
$con = mysqli_connect("localhost", "root", "", "amarbus");

$sql4 = "CREATE TABLE user_feedback(
feedback_id INT AUTO_INCREMENT PRIMARY KEY,
nid INT(20),
firstName VARCHAR(25),
lastName VARCHAR(25),
email VARCHAR(50),
userMessage VARCHAR(100)
)";

$data4 = mysqli_query($con, $sql4);

if ($data4) {
    echo "Table 4 Created";
} else {
    echo "Table 4 Not Created";
}

?>