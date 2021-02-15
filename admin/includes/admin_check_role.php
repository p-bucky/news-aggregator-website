<?php
// giving access in admin to user only if he is admin.
if ($_SESSION['logged_in']) {
    if ($_SESSION['user_role'] != 'admin') {
        header('Location: ../index.php');
        exit();
    }
} else {
    header('Location: ../admin-index.php');
    exit();
}
