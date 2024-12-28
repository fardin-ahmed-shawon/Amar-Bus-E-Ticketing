<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css/busEditDelete.css">
    <style>
        .msg-box {
            text-align: center;
            display: block;
        }
        .align {
            text-align: center;
        }
        @media only screen and (max-width: 740px) {
            .align {
                text-align: left;
            }
            .align-right-md {
                text-align: right;
            }
        }
        @media only screen and (max-width: 520px) {
            .col-3 {
                height: 70px;
            }
            .card {
                height: 530px;
            } 
        }
        @media only screen and (max-width: 420px) {
            .col-6 {
                height: 75px;
            }
            .card {
                height: 595px;
            } 
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
    <div class="container">
    <!-- Card -->
    <?php
    error_reporting(0);
    // create connection
    $con = mysqli_connect("localhost", "root", "", "amarbus");

    // showing data
    $sql = "SELECT * FROM bus_info";
    $data = mysqli_query($con, $sql);
    $total = mysqli_num_rows($data);

    if ($total != 0) {
        while($result = mysqli_fetch_array($data)) {
            echo "
            <div class='card'>
                <div class='top-area'>
                    <div class='col-3'>
                        <div class='title'>operator</div>
                        $result[operator]
                    </div>
                    <div class='col-3 align-right-md'>
                        <div class='title'>model</div>
                        $result[model]
                    </div>
                    <div class='col-3 full-col'>
                        <div class='title'>class</div>
                        $result[class]
                    </div>
                </div>
                <br><hr>
                <div class='bottom-area'>
                    <div class='col-6'>
                        <div class='title'>type</div>
                        $result[bType]
                    </div>
                    <div class='col-6 align-right-md'>
                        <div class='title'>seats</div>
                        $result[seats]
                    </div>
                    <div class='col-6'>
                        <div class='title'>route</div>
                        $result[jFrom] - $result[jTo]
                    </div>
                    <div class='col-6 align-right-md align'>
                        <div class='title'>departure</div>
                        $result[depTime]
                    </div>
                    <div class='col-6 align'>
                        <div class='title'>arrival</div>
                        $result[arrTime]
                    </div>
                    <div class='col-6 align-right-md align'>
                        <div class='title'>ticket</div>
                        $result[price] Tk
                    </div>
                </div>
                <br>
                <div class='btn-area'>
                    <div class='col-2'>
                        <a href='editBusInfo.php? 
                        b_name=$result[operator]
                        &b_model=$result[model]
                        &b_type=$result[bType]
                        &b_class=$result[class]
                        &b_coachNo=$result[coachNo]
                        &b_regNum=$result[regNum]
                        &b_from=$result[jFrom]
                        &b_to=$result[jTo]
                        &b_depTime=$result[depTime]
                        &b_arrTime=$result[arrTime]
                        &b_seats=$result[seats]
                        &b_price=$result[price]'>
                        <button>
                            Edit
                            <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQxJREFUSEu1lYsNwyAMRH2btJsko3SSjtJukoySTVwdgorwM6EFKYpEnHv2YQAyeWCyvvwFoKo3EVkAvNOETwBVXUTkJSL8oTVWADsDVHWjuA8+RITf+HYjBcTBNUBJPAgysQPAvQZQRwVM66LMnaC3iQkS8gh2pRV0AWq2RPPjgDhzb4OzxT9cizGLvAVsgK9IYgt5J/HSIhctKomHRUzXwmrTDHBVnK0eWtisoCbemKd9W9yFzS4qlW9UlDlgAU4/tMT9rh4HWOI/AZLOyFox6qixCiJAVXyogqt3hapeq2AGoOe4trg7gLV2XHOjPKMLxBJLv/PQ40nqLqNsJ19V64k3L5YekVbMdMAH5/PsGSTMuK8AAAAASUVORK5CYII='/> 
                        </button>
                        </a>
                    </div>
                    <div class='col-2 align-right'>
                        <a onclick='return checkDelete()' href='busDelete.php? b_regNum=$result[regNum]'>
                            <button>
                                Delete
                                <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAALBJREFUSEvtldENgzAMRO82KZuUUTpJR2EUGIVNjIIUKU2I7SaN+kP+wNjvzlYwMfhwcH2oABF5AlgAPCpCdgAvkltNqAVYAQSIdnaSUytAQiLJSyEiosbPXE2aVcCKF4CY0Dv41PGHg+GAqNxjPXWpfd88vJ8CcoXWcwp3ObAKdrfoBhT36tuW3DMwf03dLbIILQDPosm5G8k5f1m7yWGLvR3bLNarrs7/Ln2r9574AdxozhlwDkgoAAAAAElFTkSuQmCC'/>
                            </button>
                        </a>
                    </div>
                </div>
            </div>        
            ";
        }
    } else {
        echo "<div class='card msg-box'>
                <h2>No Records Found!<h2>
            </div>";
    }

    ?>
    </div>
</section>

<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>

<script>
    function checkDelete() {
        return confirm('Are you sure you want to delete this data?');
    }
</script>
    
</body>
</html>