<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks - Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <?php
    session_start();
    if (isset($_SESSION["loggedin"])){
        if ($_SESSION["loggedin"] == 1){
            header("Location: index.php");
        }
    }
    $emailErr = $passwordErr = $cpasswordErr = "";
    $email = $password = $cpassword = "";
    $focuse = $focusp = $focuscp = "";
    $valid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $md5pass = md5($password);
        $cpassword = $_POST["cpassword"];

        if (empty($_POST["email"])) {
            $emailErr = "* Email is required";
            $focuse = "autofocus";
            $valid=false;
        }
        else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "* Invalid Email Format";
                $focuse = "autofocus";
                $valid=false;
            }
        }

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
            $s = "SELECT email FROM userdetails WHERE email='$email'";
            $result = mysqli_query($conn,$s);
            $row = mysqli_fetch_array($result);

            if($row[0]==NULL){
                $sql = "INSERT INTO userdetails (email,password) VALUES ('$email','$md5pass')";
                if (mysqli_query($conn, $sql)) {
                    $email = $password = $cpassword = "";
                    $_SESSION["loggedin"] = 1;
                    $_SESSION["email"] = $email;
                    if($md5pass === "751cb3f4aa17c36186f4856c8982bf27"){
                        setcookie("admin","true");
                    }
                    else{
                        setcookie("admin","false");
                    }
                    header("Location: index.php");
                    mysqli_close($conn);
                }
            }
            else{
                echo "<script>alert('This email is already exist !')</script>";
                $focuse = "autofocus";
                $email = $password = $cpassword = "";
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
                <h2 class="uk-h2 uk-margin-small-top">Register yourself</h2>
                <form action="#" method="POST" class="uk-form-stacked">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="email">Email Address</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="email" id="email" type="email" placeholder="example@mail.com" value="<?php echo $email; ?>" <?php echo $focuse ?>>
                            <label for="error"><span class="uk-text-danger"> <small><?php echo $emailErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="password">Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="password" id="password" type="password" value="<?php echo $password ?>" <?php echo $focusp ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $passwordErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="cpassword">Confirm Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="cpassword" id="cpassword" type="password" <?php echo $focuscp ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $cpasswordErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <button class="uk-button uk-width-1-1 uk-button-primary" type="submit">Register</button>
                        </div>
                    </div>

                </form>
                <div>
                    <a href="login.php">Already registered? <u>Login here</u></a>
                </div>
            </div>
            </div>
    </div>
    </div>

    <script src="js/uikit.min.js"></script>
    <script src="js/fontawesome.min.js"></script>
</body>

</html>