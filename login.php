<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks - Login</title>
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

    $emailErr = $passwordErr = "";
    $email = $password = "";
    $focuse = $focusp = "";
    $valid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $md5pass = md5($password);

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

        if($valid){
            include_once 'database.php';
            $se = "SELECT email FROM userdetails WHERE email='$email'";
            $resulte = mysqli_query($conn,$se);
            $rowe = mysqli_fetch_array($resulte);

            if(empty($rowe[0])){
                echo "<script>alert('Email you have entered is wrong !')</script>";
                $email = $password = "";
                $focuse = "autofocus";
            }
            else{
                $sp = "SELECT password FROM userdetails WHERE email='$email'";
                $resultp = mysqli_query($conn,$sp);
                $rowp = mysqli_fetch_array($resultp);

                if($rowp[0]!=$md5pass){
                    echo "<script>alert('Password you have entered is wrong !')</script>";
                    $password = "";
                    $focusp = "autofocus";
                }
                else{
                    if(isset($_POST["checkbox"])){
                        setcookie("user_email",$email,time()+3600);
                        setcookie("user_password",$password,time()+3600);
                    }
                    else{
                        if(isset($_COOKIE["user_email"])){
                            setcookie("user_email","",time()-3600);
                        }
                        if(isset($_COOKIE["user_password"])){
                            setcookie("user_password","",time()-3600);
                        }
                    }
                    $_SESSION["loggedin"] = 1;
                    if(isset($_SESSION["email"])){
                        session_unset();
                        session_destroy();
                        $_SESSION["email"] = $email;
                    }
                    else{
                        $_SESSION["email"] = $email;
                    }
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
                <h2 class="uk-h2 uk-margin-small-top">Login</h2>
                <form action="#" method="POST" class="uk-form-stacked">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="email">Email Address</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="email" id="email" type="email" placeholder="example@mail.com" value="<?php if(isset($_COOKIE['user_email'])) { echo $_COOKIE['user_email']; } else { echo $email; } ?>" <?php echo $focuse ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $emailErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="password">Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="password" id="password" type="password" value="<?php if(isset($_COOKIE['user_password'])) { echo $_COOKIE['user_password']; } else { echo ""; } ?>" <?php echo $focusp ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $passwordErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <input class="uk-checkbox uk-margin-small-right" type="checkbox" name="checkbox" id="rememberme"><label for="rememberme" id="remember">Remember me</label>
                            <u class="uk-float-right"><a href="forget.php">Forget password</a></u>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <button class="uk-button uk-width-1-1 uk-button-primary" type="submit">Login</button>
                        </div>
                    </div>

                </form>
                <div>
                    <a href="register.php">Not registered yet? <u>Register here</u></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/uikit.min.js"></script>
<script src="js/fontawesome.min.js"></script>
</body>

</html>