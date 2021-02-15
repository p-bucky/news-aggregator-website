<?php
ob_start();
session_start();
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");
require_once("includes/config.php");

$account = new Account($connection);

if (isset($_POST['login'])) {
    $username = FormSanitizer::sanitizeFormUsername($_POST['username']);
    $password = FormSanitizer::sanitizeFormPassword($_POST['password']);

    $success = $account->login($username, $password);

    if ($success) {

        $query = $connection->prepare("SELECT * FROM users WHERE username=:un");
        $query->execute(['un' => $username]);
        $user = $query->fetch();

        $db_user_id = $user->user_id;
        $db_user_role = $user->user_role;
        $db_user_firstname = $user->user_firstname;
        $db_username = $user->username;
        $logged = true;


        $_SESSION['username'] = $db_username;
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['logged_in'] = $logged;

        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="assets/css/register-style.css" />
    <title>Login - Gseventy</title>
</head>

<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <div class="login">Login</div>
                <div class="eula"><a href="register.php">Don't have account? Register here.</a></div>
            </div>
            <div class="right">
                <form action="" method="POST">
                    <div class="form">
                        <div class="field-section">
                            <?php echo $account->getError(Constants::$loginFailed); ?>
                            <input type="text" id="username" name="username" autocomplete="off" required />
                            <label for="username" class="label-name">
                                <span class="content-name"> Username </span>
                            </label>
                        </div>
                        <div class="field-section">
                            <input type="password" name="password" id="password" autocomplete="off" required />
                            <label for="password" class="label-name">
                                <span class="content-name"> Password </span>
                            </label>
                        </div>

                        <div>
                            <input type="submit" id="submit" name="login" value="Login" />
                        </div>
                </form>
            </div>
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