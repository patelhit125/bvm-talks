<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks - Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/loader.css" />
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <?php
    session_start();
    if (!(isset($_SESSION["loggedin"]))){
        header("Location: login.php");
    }

    $hidden = "uk-hidden";
    $email = $_SESSION["email"];

    include_once 'database.php';

    $se = "SELECT email FROM bookticket WHERE email='$email'";
    $resulte = mysqli_query($conn,$se);
    $rowe = mysqli_fetch_array($resulte);

    if($rowe[0]==NULL){
        header("Location: bookticket.php");       
    }
    ?>

</head>

<body>

    <div class="load-frame">
        <div class="loader"></div>
    </div>

    <div class="uk-child-width-1-2@m" uk-grid>
        <div class="uk-visible@m uk-text-center" id="uk-bg-seccol">
            <img class="uk-margin-xlarge-top" src="img/illustration1-alt.svg" width="356" uk-img>
        </div>
        <div>
            <div class="uk-container uk-height-viewport">
                <div class="uk-text-right uk-margin-top">
                    <a onclick="window.history.back()">Back to home <span class="uk-margin-small-left fa fa-chevron-right"></span></a>
                </div>
                <div class="uk-margin-medium-top uk-text-center">
                    <h1 class="uk-h1">BVM <span class="seccol">Talks</span></h1>
                </div>
                <div class="uk-padding">
                    <h2 class="uk-h2 uk-margin-small-top">Your Ticket</h2>
                    <div>
                        <?php
                            $fname = $lname = $contact = $profession = "";
                            $sqlticket = "SELECT email, payment FROM bookticket WHERE email = '$email'";
                            $resultticket = mysqli_query($conn, $sqlticket);
                            $rowticket = mysqli_fetch_assoc($resultticket);
                            if($rowticket["payment"] == 1){
                                $hidden = "";
                                $sqldetail = "SELECT id, firstname, lastname, contact, profession, age, email FROM bookticket WHERE email = '$email'";
                                $resultdetail = mysqli_query($conn, $sqldetail);
                                $rowdetail = mysqli_fetch_assoc($resultdetail);
                                $fname = $rowdetail["firstname"];
                                $lname = $rowdetail["lastname"];
                                $contact = $rowdetail["contact"];
                                $profession = $rowdetail["profession"];
                                $age = $rowdetail["age"];
                                $detailemail = $rowdetail["email"];
                                $id = $rowdetail["id"];
                            }
                            else{
                                echo "<div class='uk-placeholder uk-text-center'>Your Ticket will appear here once your payment will processed.</div>";
                            }
                        ?>

                            <div class="uk-container <?php echo $hidden ?> uk-background-muted uk-box-shadow-large uk-border-rounded">
                                <div><h2 class="uk-h2 uk-text-center uk-margin-medium-top">BVM Talks</h2></div>
                                <div class="uk-container">
                                    <table class="uk-padding-small">
                                        <tbody>
                                        <tr>
                                            <td class="uk-width-small uk-text-secondary uk-text-bold">Name</td>
                                            <td><?php echo $fname ?> <?php echo $lname ?></td>
                                        </tr>
                                        <tr>
                                            <td class="uk-width-small uk-text-secondary uk-text-bold">Contact</td>
                                            <td><?php echo $contact ?></td>
                                        </tr>
                                        <tr>
                                            <td class="uk-width-small uk-text-secondary uk-text-bold">Profession</td>
                                            <td><?php echo $profession ?></td>
                                        </tr>
                                        <tr>
                                            <td class="uk-width-small uk-text-secondary uk-text-bold">Date</td>
                                            <td>25th Sep '20</td>
                                        </tr>
                                        <tr>
                                            <td class="uk-width-small uk-text-secondary uk-text-bold">Venue</td>
                                            <td>BVM Auditorium</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="uk-container uk-margin-medium-bottom uk-text-center">
                                    <hr class="uk-divider-small">
                                        <img id="barcode" src="" alt="barcode" width="250" height="250"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/uikit.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/fontawesome.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
                var bartext = "id : <?php echo $id ?>, first name : <?php echo $fname ?>, last name : <?php echo $lname ?>, email : <?php echo $detailemail ?>, contact : <?php echo $contact ?>, profession : <?php echo $profession ?>, age : <?php echo $age ?>";
                var url = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' + bartext;
                $('#barcode').attr('src', url);
        });
    </script>
    <script>
        $(window).on('load', function(){
            $('.load-frame').fadeOut();
        });
    </script>
</body>

</html>