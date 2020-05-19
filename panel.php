<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/loader.css" />
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/chart.bundle.min.js"></script>

    <?php
        session_start();
        if (isset($_SESSION["loggedin"])){
            if ($_SESSION["loggedin"] == 1){
                if(isset($_COOKIE["admin"])){
                    if($_COOKIE["admin"] == "false"){
                        header("Location: index.php");
                    }
                }       
            }
        }
        else{
            header("Location: login.php");
        }
        $btntext = "Log in";
        $onclick = "location.href='login.php'";
        $signup = "<li class=\"uk-margin-auto-vertical\"><button class=\"uk-button uk-button-primary uk-margin-small-left\" onclick=\"location.href='register.php'\">Sign up</button></li>";
        $signup_s = "<li><a class=\"uk-margin-top uk-button uk-button-primary\" onclick=\"location.href='register.php'\">Sign up</a></li>";
        if (isset($_SESSION["loggedin"])){
            if ($_SESSION["loggedin"] == 1){
                $btntext = "Log out";
                $onclick = "location.href='index.php?logged=true'";
                $signup = "";
                $signup_s = ""; 
            }       
        }
        if (isset($_GET['logged'])) {
            unsetsess();
        }
        function unsetsess() {
            $btntext = "Log in";
            session_unset();
            session_destroy();
            header("Location: login.php");
        }
    ?>
</head>

<body>
    <div class="load-frame">
        <div class="loader"></div>
    </div>

    <nav class="uk-navbar uk-navbar-transparent uk-navbar-container uk-margin-top uk-margin-large-left uk-margin-large-right uk-margin-remove@s"
        uk-sticky="show-on-up: true; animation: uk-animation-slide-top; bottom: #bottom">
        <a href="#" class="uk-navbar-item uk-logo">
            <img class="uk-hidden@m" src="img/logo@s.png" alt="LOGO" width="70" uk-img>
            <img class="uk-visible@m" src="img/logo@m.png" alt="LOGO" width="220" uk-img>
        </a>
        <div class="uk-navbar-right">
            <a class="uk-navbar-toggle uk-hidden@m" href="#" id="navbtn">
                <div id="nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <ul class="uk-navbar-nav uk-visible@m">
                <li><a href="index.php" id="gilroyfont">Home</a></li>
                <li><a href="index.php#speakers" id="gilroyfont">Speakers</a></li>
                <li><a href="index.php#schedule" id="gilroyfont">Schedule</a></li>
                <li><a href="index.php#gallery_" id="gilroyfont">Gallery</a></li>
                <li><a href="index.php#venue" id="gilroyfont">Venue</a></li>
                <li><a href="#contact" id="gilroyfont" uk-scroll>Contact</a></li>
                <li class="uk-margin-auto-vertical"><button class="uk-button uk-margin-large-left" onclick=<?php echo $onclick ?>><?php echo $btntext ?></button></li>
                <?php echo $signup ?>
            </ul>
        </div>
        <div class="uk-hidden@m" id="navbarNav">
            <img id="svg" class="uk-align-center" src="img/logo.svg" alt="LOGO" width="200">
            <div class="uk-container">
                <ul class="uk-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#speakers">Speakers</a></li>
                    <li><a href="index.php#schedule">Schedule</a></li>
                    <li><a href="index.php#gallery_">Gallery</a></li>
                    <li><a href="index.php#venue">Venue</a></li>
                    <li><a href="#contact" uk-scroll>Contact</a></li>
                    <li><a onclick=<?php echo $onclick ?>><?php echo $btntext ?></a></li>
                    <?php echo $signup_s ?>
                </ul>
            </div>

        </div>
    </nav>

    <img class="uk-hidden@m" id="svg" src="img/logo.svg" width="200">

    <div class="uk-container uk-margin-xlarge-left uk-margin-remove@s">
        <div class="uk-child-width-1-2@m" uk-grid>
            <div class="uk-margin-xlarge-top">
                <h1 class="uk-h1">Admin Panel</h1>
                <div>
                    <ul class="uk-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><span>Admin Panel</span></li>
                    </ul>
                </div>
                <div class="uk-margin-medium-top">
                    <a href="https://maps.google.com/?q=22.5518978,72.9239577"><span class="fa fa-fw fa-map-marker-alt"></span> BVM Auditorium</a><br>
                    <a href="#"><span class="fa fa-fw fa-calendar-day" type="button"></span> 25 Sep 2020</a>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li class="uk-nav-header">Add to your calendar</li>
                            <li><a href="https://www.google.com/calendar/render?action=TEMPLATE&text=BVM+Talks&dates=20200925T050000Z/20200925T070000Z&location=BVM+Auditorium,+BVM+College,+Vallabh+Vidhyanagar,+Anand+-+388120&sprop=name:BVM+Talks&sprop=website:www.bvm-talks.com&details=BVM+Talks+event&sf=true&output=xml" target="_blank"><span class="fab fa-google fa-fw"></span> Google</a></li>
                            <li><a href="https://outlook.live.com/owa/0/?path=%2fcalendar%2faction%2fcompose#startdt=20200925T050000Z&enddt=20200925T070000Z&subject=BVM+Talks&location=BVM+Talks&location=BVM+Auditorium,+Vallabh+Vidhyanagar,+Anand+-+388120&body=BVM+Talks+event&allday=&uid=" target="_blank"><span class="fa fa-envelope fa-fw"></span> Outlook</a></li>
                            <li><a href="https://calendar.yahoo.com/?v=60&view=d&type=20&title=BVM+Talks&st=20200925T103000&et=20200925T123000&desc=BVM+Talks+event&in_loc=BVM+Auditorium,+BVM+College,+Vallabh+Vidhyanagar,+Anand+-+388120&url=www.bvm-talks.com&uid=" target="_blank"><span class="fab fa-yahoo fa-fw"></span> Yahoo</a></li>
                            <li class="uk-nav-divider"></li>
                            <li>( online calendars )</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="uk-visible@m uk-text-center uk-margin-medium-top">
                <img src="img/illustration1.svg" width="320" alt="image" uk-image>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-large-top uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s">
        <div class="uk-margin-medium-top">
            <h2 class="uk-h2">Book Ticket Table</h2>
        </div>
    <div class="uk-overflow-auto">
        <?php

            include_once 'database.php';

            $check = "<span class='fa fa-times'></span>";
            $count = 1;

            $sqltotal = "SELECT id FROM userdetails";
            $resulttotal = mysqli_query($conn, $sqltotal);
            $rowcount = mysqli_num_rows($resulttotal);

            $sql = "SELECT id, firstname, lastname, email, contact, age, profession, book_date, payment FROM bookticket";
            $result = mysqli_query($conn, $sql);

            echo "<table class='uk-table uk-table-striped uk-margin-bottom'>";
            echo "<thead><tr><td>ID</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Contact</td><td>Age</td><td>Profession</td><td>Booked Date</td><td>Payment</td></tr></thead><tbody>";

            if (mysqli_num_rows($result) > 0) {
                $count = $count + 1;
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["payment"] == 1){
                        $check = "<span class='fa fa-check'></span>";
                    }
                    else{
                        $check = "<span class='fa fa-times'></span>";
                    }
                    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td>".$row["age"]."</td><td>". $row["profession"]."</td><td>". $row["book_date"]."</td><td><a class='uk-link' href='panel.php?id=".$row["id"]."'>Paid ".$check."</a></td></tr>";
                }
            }
            else {
                echo "0 Tickets Booked...";
            }

            echo "<tr><td>Total</td><td>".$count."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            echo "</tbody></table>";

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sqlpaid = "UPDATE bookticket SET payment = 1 WHERE id = $id";
                $r = mysqli_query($conn, $sqlpaid);
                mysqli_close($conn);
            }

        ?>

    </div>
        <div class="uk-margin-top">
            <a href="" class="uk-button" type="button" uk-toggle="target: #modal-close-default">Download Table</a>
        </div>

        <div id="modal-close-default" uk-modal>
            <div class="uk-modal-dialog uk-modal-body border">
                <button class="uk-modal-close-default uk-padding-small" type="button" uk-close></button>
                <h2 class="uk-modal-title uk-h2">Download</h2>
                <p>
                    > Click <code>DOWNLOAD</code> button below and in the next page go to <code>Format:</code> section<br>
                    > Select the format of table<br>
                    > For default select <code>CSV</code> option<br>
                    > Press <code>Go</code> for download
                </p>
                <div class="uk-modal-footer uk-text-right">
                    <a href="http://localhost/phpmyadmin/tbl_export.php?db=bvmtalks&table=bookticket&single_table=true" class="uk-button uk-button-primary" type="button">Download</a>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-large-top uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s">
        <h2 class="uk-h2 uk-margin-medium-top">Charts</h2>
        <div class="uk-child-width-1-2@m uk-margin-bottom" uk-grid>
            <div>
                <h3 class="uk-h3 uk-text-center">Auditorium Seats</h3>
                <canvas id="bookedChart1" width="500" height="500"></canvas>
                <script>
                Chart.defaults.global.defaultFontFamily = 'CircularStd';
                Chart.defaults.global.defaultFontSize = 15;
                var ctx1 = document.getElementById('bookedChart1');
                var bookedChart1 = new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [<?php echo $count ?>, 450-<?php echo $count ?>],

                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)'
                            ],

                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)'
                            ],

                            borderWidth: 1,

                            hoverBackgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)'
                            ],

                            hoverBorderWidth: 3
                        }],

                        labels: [
                            'Occupied ',
                            'Unoccupied '
                        ]
                    },
                    options: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                fontColor: 'rgb(0, 0, 0)',
                                padding: 30
                            }
                        }
                    }
                });
                </script>
            </div>
            <div>
                <h3 class="uk-h3 uk-text-center">Ticket Booked Ratio</h3>
                <canvas id="bookedChart2" width="500" height="500"></canvas>
                <script>
                    Chart.defaults.global.defaultFontFamily = 'CircularStd';
                    Chart.defaults.global.defaultFontSize = 15;
                    var ctx2 = document.getElementById('bookedChart2');
                    var bookedChart2 = new Chart(ctx2, {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [<?php echo $count ?>, <?php echo $rowcount ?>-<?php echo $count ?>-1],

                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)'
                                ],

                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],

                                borderWidth: 1,

                                hoverBackgroundColor: [
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(54, 162, 235, 0.5)'
                                ],

                                hoverBorderWidth: 3
                            }],

                            labels: [
                                'Booked ',
                                'Not Yet Booked '
                            ]
                        },
                        options: {
                            legend: {
                                display: true,
                                position: 'bottom',
                                labels: {
                                    fontColor: 'rgb(0, 0, 0)',
                                    padding: 30
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    
    <div id="uk-bg-seccol">
        <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="contact">
            <div class="uk-text-center uk-padding-small"><a href="#" uk-scroll><span class="fa fa-chevron-up"></span></a></div>
            <div class="uk-child-width-1-2@m uk-padding" uk-grid>
                <div>
                    <div>
                        <h4 class="uk-h4 uk-text-muted">Links</h4>
                        <div>
                            <ul class="uk-list">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="index.php#speakers">Speakers</a></li>
                                <li><a href="index.php#schedule">Schedule</a></li>
                                <li><a href="index.php#gallery_">Gallery</a></li>
                                <li><a href="index.php#venue">Venue</a></li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h4 class="uk-h4 uk-text-muted">About BVM Talks</h4>
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                </div>
                <div>
                   <div>
                        <h4 class="uk-h4 uk-text-muted">Contact</h4>
                        <div>
                            BVM Engineering college,<br>
                            Vallbh Vidhyanagar<br>
                            Anand - 388120<br>
                            <div class="uk-margin-top uk-margin-medium-bottom">
                                <a href="#">bvmenginnering.ac@mail.com</a>
                            </div>
                        </div>
                   </div>
                   <div>
                        <h4 class="uk-h4 uk-text-muted">Follow</h4>
                        <div>
                            <a href="#" class="uk-icon-button uk-margin-small-right"><span class="fab fa-twitter"></span></a>
                            <a href="#" class="uk-icon-button uk-margin-small-right"><span class="fab fa-dribbble"></span></a>
                            <a href="#" class="uk-icon-button uk-margin-small-right"><span class="fab fa-instagram"></span></a>
                            <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                        </div>
                   </div>
                </div>
            </div>
            <hr />
            <div class="uk-text-center">&copy; Copyright <script>document.write(new Date().getFullYear())</script> BVM college</div>
        </div>    
    </div>

    <a href="#" id="back-to-top" role="button" uk-scroll><span class="fa fa-chevron-up"></span></a>
    
    <script src="js/uikit.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/fontawesome.min.js"></script>
    <script>
        $(window).on('load', function(){
            $('.load-frame').fadeOut();
        });
    </script>
</body>

</html> 