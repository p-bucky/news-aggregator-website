<?php
ob_start();
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");
require_once("includes/config.php");

$account = new Account($connection);

if (isset($_POST['register_btn'])) {
    $firstName = FormSanitizer::sanitizeFormString($_POST['firstName']);
    $username = FormSanitizer::sanitizeFormUsername($_POST['username']);
    $email = FormSanitizer::sanitizeFormEmail($_POST['email']);
    $password = FormSanitizer::sanitizeFormPassword($_POST['password']);
    $user_role = "user";

    $success = $account->register($firstName, $username, $email, $password, $user_role);

    if ($success) {

        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="assets/css/register-style.css" />
    <title>Register - Gseventy</title>
</head>

<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <div class="login">Register</div>
                <div class="eula"><a href="login.php">Already have account? Login here.</a></div>
            </div>
            <div class="right">
                <form action="" method="POST">
                    <div class="form">
                        <div class="field-section">
                            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                            <input type="text" id="firstname" name="firstName" autocomplete="off" required />
                            <label for="username" class="label-name">
                                <span class="content-name"> First name </span>
                            </label>
                        </div>

                        <div class="field-section">
                            <?php echo $account->getError(Constants::$usernameCharacters); ?>
                            <?php echo $account->getError(Constants::$usernameTaken); ?>
                            <input type="text" id="username" name="username" autocomplete="off" required />
                            <label for="username" class="label-name">
                                <span class="content-name"> Username </span>
                            </label>
                        </div>

                        <div class="field-section">
                            <?php echo $account->getError(Constants::$emailTaken); ?>
                            <?php echo $account->getError(Constants::$emailInvalid); ?>
                            <input type="email" name="email" id="email" autocomplete="off" required />
                            <label for="email" class="label-name">
                                <span class="content-name"> Email </span>
                            </label>
                        </div>

                        <div class="field-section">
                            <?php echo $account->getError(Constants::$passwordLength); ?>
                            <input type="password" name="password" id="password" autocomplete="off" required />
                            <label for="password" class="label-name">
                                <span class="content-name"> Password </span>
                            </label>
                        </div>

                        <div>
                            <input type="submit" id="submit" name="register_btn" value="Register" />
                        </div>
                </form>
                <!-- <div class="link">
              <a href="login.php">Login</a>
            </div> -->
            </div>

        </div>

    </div>
    <script src="assets/js/app_login_register.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js'></script>
</body>

</html>