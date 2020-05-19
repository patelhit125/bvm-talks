<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks - Book Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <?php
    session_start();
    if (!(isset($_SESSION["loggedin"]))){
        header("Location: login.php");
    }

    $contactErr = $passwordErr = $ageErr = $FirstnameErr = $LastnameErr = $selectErr = "";
    $contact = $password = $age = $Firstname = $Lastname = $select = "";
    $focusc = $focusp = $focusa = $focusf = $focusl = "";
    $valid = true;
    $email = $_SESSION["email"];

    include_once 'database.php';
    $se = "SELECT email FROM bookticket WHERE email='$email'";
    $resulte = mysqli_query($conn,$se);
    $rowe = mysqli_fetch_array($resulte);

    if($rowe[0]!=NULL){
        header("Location: ticket.php");       
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Firstname = $_POST["fname"];
        $Lastname = $_POST["lname"];
        $password = $_POST["password"];
        $md5pass = md5($password);
        $contact = $_POST["contact"];
        $age = $_POST["age"];
        $select = $_POST["select"];

        if (empty($_POST["fname"])) {
            $FirstnameErr = "* First name is required";
            $focusf = "autofocus";
            $valid=false;
        }

        if (empty($_POST["lname"])) {
            $LastnameErr = "* Last name is required";
            $focusl = "autofocus";
            $valid=false;
        }

        if (empty($_POST["password"])) {
            $passwordErr = "* Password Is Required";
            $focusp = "autofocus";
            $valid=false;
        }
        else{
            $sp = "SELECT password FROM userdetails WHERE email='$email'";
            $resultp = mysqli_query($conn,$sp);
            $rowp = mysqli_fetch_array($resultp);

            if($rowp[0]!=$md5pass){
                echo "<script>alert('Password you have entered is wrong !')</script>";
                $password = "";
                $focusp = "autofocus";
                $valid=false;
            }
        }

        if (empty($_POST["contact"])) {
            $contactErr = "* Contact Number Is Required";
            $focusc = "autofocus";
            $valid=false;
        }
        else{
            if(!preg_match('/^[0-9]{10}+$/', $_POST['contact'])){
                $contactErr = '* Invalid Conatct Number !';
                $focusc = "autofocus";
                $valid=false;
            }
        }

        if (empty($_POST["age"])) {
            $ageErr = "* Age Is Required";
            $focusa = "autofocus";
            $valid=false;
        }
        else{
            if(!preg_match('/^[0-9]{1,2}+$/', $_POST['age'])){
                $ageErr = '* Invalid Age !';
                $focusa = "autofocus";
                $valid=false;
            }
        }

        if (empty($_POST["age"])) {
            $ageErr = "* Age Is Required";
            $focusa = "autofocus";
            $valid=false;
        }
        else{
            if(!preg_match('/^[0-9]{1,2}+$/', $_POST['age'])){
                $ageErr = '* Invalid Age !';
                $focusa = "autofocus";
                $valid=false;
            }
        }

        if ($_POST["select"] == "Select") {
            $selectErr = "* Required";
            $valid=false;
        }

        if($valid){
            $s = "SELECT email FROM bookticket WHERE email='$email'";
            $result = mysqli_query($conn,$s);
            $row = mysqli_fetch_array($result);

            if($row[0]==NULL){
                $sql = "INSERT INTO bookticket (firstname, lastname, email, contact, age, profession) VALUES ('$Firstname', '$Lastname', '$email', '$contact', '$age', '$select')";
                if (mysqli_query($conn, $sql)) {
                    header("Location: ticket.php");
                    mysqli_close($conn);
                }
                else{
                    die(mysqli_error($conn));
                }
            }
            else{
                header("Location: ticket.php");
            }
        }
    }
    ?>
</head>

<body>

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
                <h2 class="uk-h2 uk-margin-small-top">Book Ticket</h2>
                
                <form action="#" method="POST" class="uk-form-stacked">

                    <div class="uk-margin  uk-child-width-1-2" uk-grid>
                        <div class="uk-form-controls">
                            <label class="uk-form-label" for="FirstName">First Name</label>
                            <input class="uk-input" name="fname" id="FirstName" type="text" value="<?php echo $Firstname ?>" <?php echo $focusf ?>>
                            <label for="error"><span class="uk-text-danger"> <small><?php echo $FirstnameErr; ?></small></span></label>
                        </div>
                        <div class="uk-form-controls">
                            <label class="uk-form-label" for="lastName">Last Name</label>
                            <input class="uk-input" name="lname" id="lastName" type="text" value="<?php echo $Lastname ?>" <?php echo $focusl ?>>
                            <label for="error"><span class="uk-text-danger"> <small><?php echo $LastnameErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="password">Account Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="password" id="password" type="password" value="<?php echo $password ?>" <?php echo $focusp ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $passwordErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="contact">Contact Number</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="contact" id="contact" type="tel" value="<?php echo $contact ?>" <?php echo $focusc ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $contactErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="age">Age</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="age" id="age" type="text" value="<?php echo $age ?>" <?php echo $focusa ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $ageErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                    <label class="uk-form-label" for="select">Profession</label>
                        <div uk-form-custom="target: > * > span:first-child">
                            <select name="select" id="select">
                                <option>Select</option>
                                <option value="Student">Student</option>
                                <option value="Professor">Professor</option>
                                <option value="Other">Other</option>
                            </select>
                            <button class="uk-button" type="button" tabindex="-1">
                                <span></span>
                                <span class="fa fa-chevron-down uk-margin-small-left"></span>
                            </button>
                        </div>
                        <label for="error"> <span class="uk-text-danger"> <small> <?php echo $selectErr; ?></small></span></label>
                    </div>                    

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <button class="uk-button uk-width-1-1 uk-button-primary" type="submit">BOOK NOW</button>
                        </div>
                    </div>

                </form>
            </div>
            </div>
    </div>
    </div>

    <script src="js/uikit.min.js"></script>
    <script src="js/fontawesome.min.js"></script>
</body>

</html>