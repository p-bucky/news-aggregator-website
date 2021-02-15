<?php require_once("includes/config.php"); ?>

  <?php
    //  Delete Post
    if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];
        $status_offline = 'offline';
        $sql = "UPDATE posts SET status = :st WHERE post_id = :pid";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['st' => $status_offline, 'pid' => $the_post_id]);
        header("Location: profile.php");
    }
    ?>