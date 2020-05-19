<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks - Forget Password</title>
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
    $emailErr =  "";
    $email =  "";
    $focuse = "";
    $valid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
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

        if($valid){
            include_once 'database.php';
            $se = "SELECT email FROM userdetails WHERE email='$email'";
            $resulte = mysqli_query($conn,$se);
            $rowe = mysqli_fetch_array($resulte);

            if(empty($rowe[0])){
                echo "<script>alert('Email you have entered is wrong !')</script>";
                $focuse = "autofocus";
                $email = "";
            }
            else{
                echo "<script>alert('Email for reset password has been sent to your email account')</script>";
                setcookie("user_emailForget",$email,time()+900);
                mysqli_close($conn);
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
                <h2 class="uk-h2 uk-margin-small-top">Forget Password</h2>
                <form action="#" method="POST" class="uk-form-stacked">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="email">Email Address</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="email" id="email" type="email" placeholder="example@mail.com" <?php echo $focuse ?>>
                            <label for="error"> <span class="uk-text-danger"> <small> <?php echo $emailErr; ?></small></span></label>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <button class="uk-button uk-width-1-1 uk-button-primary" type="submit">Send</button>
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