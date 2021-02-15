<?php require_once("includes/classes/DateModifier.php"); ?>

<!-- HEADER  -->
<?php include "./includes/header.php" ?>

<!-- NAVIGATION -->
<?php include "./includes/navigation.php" ?>

<?php
// Taking username from url.
if (isset($_GET['username'])) {
    $writer_username =  $_GET['username'];
}

// Taking data for showing post writer detail.
$sql = 'SELECT * FROM users WHERE username=:un';
$stmt = $connection->prepare($sql);
$stmt->execute(['un' => $writer_username]);
$users = $stmt->fetchAll();

// If user write some random username or wrong username then redirect to index.php.
if (!$users) {
    header("Location: index.php");
    exit();
}

foreach ($users as $user) {
    $name = $user->user_firstname;
    $username = $user->username;
    $user_bio = $user->biography;
?>

    <!-- Writer profile starts from here. -->
    <div class="profile">
        <div class="profile-card">
            <div class="profile-card-content">
                <div class="profile-card-img">
                    <img src="./assets/images/dummy-profile.jpg" alt="profile-img">
                </div>
                <div class="profile-card-body">
                    <span class="profile-name"><?php echo $name ?></span>
                    <span class="profile-username">@<?php echo $username ?></span>
                    <span class="profile-bio-head">Achievements in Gaming</span>
                    <span class="profile-bio"><?php echo $user_bio; ?></span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php include "writer_post.php" ?>

<?php include "./includes/footer.php" ?>