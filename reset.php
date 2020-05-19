<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks - Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <?php
    if(isset($_COOKIE["user_emailForget"])){
        $email = $_COOKIE["user_emailForget"];
    }
    else{
        header("Location: forget.php");
    }
    $passwordErr = $cpasswordErr = "";
    $password = $cpassword = "";
    $focusp = $focuscp = "";
    $valid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];
        $md5pass = md5($password);
        $cpassword = $_POST["cpassword"];

        if (empty($_POST["password"])) {
            $passwordErr = "* Password Is Required";
            $focusp = "autofocus";
            $valid=false;
        }
        elseif($_POST["password"]!=null){
            if (strlen($_POST["password"]) <= '8') {
                $passwordErr = "* Your Password Must Contain At Least 8 Characters !<br>";
                $focusp = "autofocus";
                $valid=false;
            }
            if(!preg_match("#[0-9]+#",$password)) {
                $passwordErr .= "* Your Password Must Contain At Least 1 Number !<br>";
                $focusp = "autofocus";
                $valid=false;
            }
            if(!preg_match("#[A-Z]+#",$password)) {
                $passwordErr .= "* Your Password Must Contain At Least 1 Capital Letter !<br>";
                $focusp = "autofocus";
                $valid=false;
            }
            if(!preg_match("#[a-z]+#",$password)) {
                $passwordErr .="* Your Password Must Contain At Least 1 Lowercase Letter !<br>";
                $focusp = "autofocus";
                $valid=false;
            }
        }
        if(empty($_POST["cpassword"]) && $_POST["password"]!=null){
            $cpasswordErr="* Please Retype your Password !";
            $focuscp = "autofocus";
            $valid=false;
        }
        elseif(!($_POST["password"] == $_POST["cpassword"])){
            $cpasswordErr="* Please Check The Confirm Password You've Entered !";
            $focuscp = "autofocus";
            $valid=false;
        }


        if($valid){
            include_once 'database.php';
            $s = "SELECT password FROM userdetails WHERE email='$email'";
            $result = mysqli_query($conn,$s);
            $row = mysqli_fetch_array($result);

            if($row[0]!=$md5pass){
                $sql = "UPDATE userdetails SET password = '$md5pass' WHERE email = '$email';";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Password is successfully changed !')</script>";
                    $password = $cpassword = "";
                    header("Location: login.php");
                    setcookie("user_emailForget","",time()-900);
                    mysqli_close($conn);
                }
            }
            else{
                echo "<script>alert('This password is already exist !')</script>";
                $focusp = "autofocus";
                $password = $cpassword = "";
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
            <div class="uk-margin-medium-top uk-text-center">
                <h1 class="uk-h1">BVM <span class="seccol">Talks</span></h1>
            </div>
            <div class="uk-padding">
                <h2 class="uk-h2 uk-margin-small-top">Reset Password</h2>
                <form class="uk-form-stacked" action="#" method="POST">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="password">New Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="password" id="password" type="password" value="<?php echo $password ?>" <?php echo $focusp ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $passwordErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="cpassword">Confirm New Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="cpassword" id="cpassword" type="password" <?php echo $focuscp ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $cpasswordErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <button class="uk-button uk-width-1-1 uk-button-primary" type="submit">Reset</button>
                        </div>
                    </div>

                </form>
                <div>
                    <a href="login.php"><u>Login here</u></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/uikit.min.js"></script>
<script src="js/fontawesome.min.js"></script>
</body>

</html>