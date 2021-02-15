<?php ob_start(); ?>
<?php session_start(); ?>

<?php
$_SESSION['logged_in'] = null;
$_SESSION['user_role'] = null;
$_SESSION['user_id'] = null;
$_SESSION['user_firstname'] = null;
header("Location: ../index.php");
?>