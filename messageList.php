<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css//messageList.css">
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

<!-- User Information -->
<section>
    <div class="container">
        <!-- Message List -->
        <?php
        // Create database connection
        $con = mysqli_connect("localhost","root","","amarbus");

        $sql = "SELECT * FROM user_feedback";
        $data = mysqli_query($con, $sql);
        $total = mysqli_num_rows($data);

        if ($total != 0) {
            while($result = mysqli_fetch_array($data)) {
                echo "
                <div class='card'>
                    <h1>Message</h1>
                        <div style='overflow-x: auto;'>
                            <table class='table'>
                                <tbody>
                                    <tr>
                                        <td>First Name</td>
                                        <td>:</td>
                                        <td>$result[firstName]</td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td>:</td>
                                        <td>$result[lastName]</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>$result[email]</td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td>:</td>
                                        <td>$result[userMessage]</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <br>
                    <div>
                        <a onclick='checkDelete()' href='deleteMessage.php?fi=$result[feedback_id]'>
                            <button class='btn'>
                                Delete
                                <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAALBJREFUSEvtldENgzAMRO82KZuUUTpJR2EUGIVNjIIUKU2I7SaN+kP+wNjvzlYwMfhwcH2oABF5AlgAPCpCdgAvkltNqAVYAQSIdnaSUytAQiLJSyEiosbPXE2aVcCKF4CY0Dv41PGHg+GAqNxjPXWpfd88vJ8CcoXWcwp3ObAKdrfoBhT36tuW3DMwf03dLbIILQDPosm5G8k5f1m7yWGLvR3bLNarrs7/Ln2r9574AdxozhlwDkgoAAAAAElFTkSuQmCC'/>
                            </button>
                        </a>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<div style='text-align: center' class='card'><h2>No Message Was Found!</h2></div>";
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
