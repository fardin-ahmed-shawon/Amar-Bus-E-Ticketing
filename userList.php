<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css//userList.css">
    <style>
        a {
            text-decoration: none;
        }
        .table-area {
            overflow-x: auto;
        }
    </style>
</head>
<body>

<!-- START NAV AREA -->
<nav>
    <div class="nav-area">
        <div class="logo">
            <a href="adminHome.php"><img src="img/logo.png" alt="LOGO"></a>
        </div>
    </div>
</nav>
<!-- END NAV AREA -->
<section>
    <div class="card">
        <h1>User Information</h1><hr><br><br>
        <div class="table-area">
        <table class="table">
                <tbody>
                    <tr>
                        <th>User Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>NID No</th>
                    </tr>
                    <?php
                    error_reporting(0);
                    $con = mysqli_connect("localhost", "root", "", "amarbus");

                    // SQL join
                    $sql = "SELECT * FROM user_info";
                    $data = mysqli_query($con, $sql);
                    $total = mysqli_num_rows($data);

                    if ($total != 0) {
                        while($result = mysqli_fetch_array($data)) {
                            echo "
                                <tr>
                                    <td>$result[name]</td>
                                    <td>$result[mobile]</td>
                                    <td>$result[email]</td>
                                    <td>$result[nid]</td>
                                </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

</body>
</html>