<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMAR BUS</title>
    <link rel="stylesheet" href="css//adminHome.css">
</head>
<body>

<!-- START NAV AREA -->
<nav>
    <div class="nav-area">
        <div class="logo">
            <img src="img/logo.png" alt="LOGO">
        </div>
    </div>
</nav>
<!-- END NAV AREA -->

<section>
    <div class="container">
        <div class="box"><br>
            <div class="poster-img">
                <img src="img/green-logo.png" alt="LOGO2">
            </div><br>
            <a href="busAdd.php">
                <button class="btn">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAANxJREFUSEvVlesNgzAQg+1N2k3KKJ2ko3SUMgqbXGVEqpDmmgegCiTEj8T33SM4xMEPD46PFcDMbgCeAC6d4AnAneQY9CngBUCQLc9E8uoBTAsku1pnZl/6tIL/AnIZxr3cXME5ASFr71jFB6KrRYcDSkMsrTcd03MOucUzuoa8N8AzO7nkQFJfmJncVq6bM8aR5OCZnQQPRzhDFqEX/Ldd59qxZKvKlLUC6FUiK1t2f8SaHicQSaqCz9ZfA4j6rkp0X3wulJK+GhAgYdClwNkh14pa9jVV0BI47H0DZ0+yGRqGBZ0AAAAASUVORK5CYII="/>
                    Add Bus
                </button>
            </a>
            <a href="busEditDelete.php">
                <button class="btn">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQlJREFUSEvFVcENwjAMvNsENoFN4AtDAEPAl1FgE7rJUZcmKmnSJIKCpaqVYvvOztklZjbOnB8jAEkLAAcAKwD2XWINAHu2JO3t7Q2gT/4oyTjhsxyChADXlsmmZX+PsUkllWTVWqxVfCJ5dL4hgD5k34WzRfgvwJDBsCJJXYU1574USbdeOVUJYgTsDkmuOzLOwbGrZZgA8CR/CmD6Lx2snNjGLbKIYZtyGabOszJNqSQHGlNZdNAMQNIZwA7AheQ+ljz0qQXwU53TvVNeLcC8FeT6nWjZaNLDO/iGVBuSy9Sys7VrK+MTW5O0df/arGGmkpVRExMDcG3y05grR1Iy5vc//Rzb2vMnuVq5Gfrzmu4AAAAASUVORK5CYII="/>
                    Bus Information
                </button>
            </a>
            <a href="userList.php">
                <button class="btn">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPBJREFUSEvtVVEOgjAUa2+iN9GbyEnUk6gnkZvoTSo1QHBubNPwY3wJCclC27UdIxYeLoyPP0HW4ahFklYA9gB23XMH0AI4kvR71aQIrh3oJkC6k1xXoXeq3ggkWfUpAbQl6d1AkubISD6xYwSH3p7Y97bJ618R2BpbFJuG5LnGptgOHLAtCjNoSW5rwKMW9ds3ibNwk54tItmE4HM5JDOoUfgRgSRbY+VTi4azcBlaVCrkJYNMRQfMsUklJCNBrzzVnhArex7eMpDk5jjYkhkblcohRnAD4PaUTPFvY2rR7NEPWQeFOTX/Cyfn0A/cyQ/fxV0ZRq1OsQAAAABJRU5ErkJggg=="/>
                    User Information
                </button>
            </a>
            <a href="messageList.php">
                <button class="btn">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAL5JREFUSEvdldERgjAQRHc70U60E61ErMRSpBQ6OT1mYEImCXcT7kPzyWX2sZuwEMGLwfpYASJyAfACcOqETgDuJEfVSQFvAAo5Yk0kzzlA5gdkV2wistFJHfwhYLG7dyhprK6IwgF7b16auxyEA1oR1a6zy0E4IDyinwNUy245UEfjjiSvedlpkz4qjarNqLObIbZyXbc+mmz2/BbuYADNW5rVnF3T1bZV3ArYWPaIWwCDJ44SvOvvZXETDvgAdJCfGdTBwiYAAAAASUVORK5CYII="/>
                    Message List
                </button>
            </a>
            <a href="bookingHistory.php">
                <button class="btn">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvdVcFtAkEMHHcSKiFUEqgEqCSkktAJpBJzc7KRb9e7S5CQovhzd2LtGXtmjeDFIS+uj78BoKrvAD4A8BnjC8BJRK6tSXQ7UNU3AJ9J4bLeGcAuA2oCGOvvUOkE4Bi+Ce5d8Z1dbEqQFMCYX6zYWUQ2PTOoKs+mIC2AA4D9NJphcQcOIEcRYf4cFUBgfxWRVclcVXVOnKokv3knKx9VdsjZL5gEpj0AGmJrglOztAMKSztSMLpjEYMOmMd8WnfXAmgyZIIDRFQfVzbe+4im0fpoYm4l8tMAxs5F4mcq8sCutCpr3HMXIluLnCEPphoMACqDtFxEBrMLHo3icrZt+mjBxF3uvsVoR8uOvmbwTqQbs1iI1T7qLTvq4HoQJFt2vm29oUq34R+Oqvrt7E3v9+s6VrPVzVu6NoeROTv6sYVY3XjPH3bwrOj/B+AGEPawGQoXqy8AAAAASUVORK5CYII="/>
                    Booking History
                </button>
            </a>
            <a href="adminLogin.php">
                <button class="btn">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAM1JREFUSEvVVdsNwjAQszeBTWCTMgkwSUehm9BNTC9KpRJEk5MSKc1PPnJ3jn0vovFh4/joA0DSBcAdgN25MwF4krS7jIGkN4BTLvLmfSJ59QAoGJNZSSV92WYdLHDqtMekHwBJI8lbdQaSLJmjVUyJ5qlcuxLFcnytTlUBJA3x545q/K2svwyW6nrEZmoDEJNp+ptEoamqSrR+OyY5gDQB2DAZlsY12Q7aaNtMH3NUJAy843omefaMa1s0Nj5KdoJ/4bg6LzEu2gddA3wAjdGOGZCTxlcAAAAASUVORK5CYII="/>
                    Logout
                </button>
            </a>
            <br>
        </div>
    </div>
</section>
<footer>Copyright © 2024<a href="https://www.linkedin.com/in/fardin-ahmed-shawon-9397361bb/" target="_blank">Fardin Ahmed Shawon.</a>All Rights Reserved.</footer>



</body>
</html>