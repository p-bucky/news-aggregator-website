<?php require_once("includes/classes/DateModifier.php"); ?>

<!-- HEADER  -->
<?php include "./includes/header.php" ?>

<!-- NAVIGATION -->
<?php include "./includes/navigation.php" ?>

<?php
// if user not logged in then page should redirect to index.php.
if (!isset($_SESSION['logged_in'])) {
    header("Location: ./index.php");
    exit();
}

// Using session to take username then taking user data from db by using username.
$user_id = $_SESSION['user_id'];
$sql = 'SELECT * FROM users WHERE user_id=:ui';
$stmt = $connection->prepare($sql);
$stmt->execute(['ui' => $user_id]);
$users = $stmt->fetchAll();

foreach ($users as $user) {
    $name = $user->user_firstname;
    $username = $user->username;
    $user_bio = $user->biography;
?>
    <!-- User profile starts from here. -->
    <div class="profile">
        <div class="profile-card">
            <div class="profile-card-content">
                <div class="profile-card-img">
                    <img src="./assets/images/dummy-profile.jpg" alt="profile-img">
                </div>
                <div class="profile-card-body">
                    <div>
                        <span class="profile-name"><?php echo $name ?></span>
                        <a href="./update-profile.php">Edit Profile</a>
                    </div>
                    <span class="profile-username">@<?php echo $username ?></span>
                    <span class="profile-bio-head">Achievements in Gaming</span>
                    <span class="profile-bio"><?php echo $user_bio; ?></span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php include "user_post.php" ?>


<?php include "./includes/footer.php" ?>