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

// Taking post_id from url
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$sql = "SELECT * FROM posts WHERE post_id = :pid";
$stmt = $connection->prepare($sql);
$stmt->execute(['pid' => $the_post_id]);
$posts = $stmt->fetchAll();

foreach ($posts as $post) {
    $post_id = $post->post_id;
    $post_author = $post->post_author;
    $post_title = $post->post_title;
    $post_category = $post->post_category_id;
    $post_image = $post->post_image;
    $post_date = $post->post_date;
    $post_tags = $post->post_tags;
    $post_external_link = $post->external_link;
    $post_content = $post->post_content;
    $image_credit = $post->image_credit;
    $status = $post->status;
}

// Edit post only if it is online.
if ($status != 'online') {
    header("Location: ./index.php");
    exit();
}

if (isset($_POST['update_post'])) {
    $post_title = $_POST['title'];
    $post_category = $_POST['post_category_id'];
    $post_image = $_POST['image'];
    $post_tags = $_POST['post_tags'];
    $post_external_link = $_POST['external_link'];
    $post_content = $_POST['post_content'];
    $image_credit = $_POST['image_credit'];
    $status = 'online';

    $sql = "UPDATE posts SET post_category_id = :pci, post_title = :pt, post_image = :pim, post_content = :pc, external_link = :el, post_tags = :ptag, status = :st, image_credit = :ic WHERE post_id = :pid";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['pci' => $post_category, 'pt' => $post_title, 'pim' => $post_image, 'pc' => $post_content, 'el' => $post_external_link, 'ptag' => $post_tags, 'st' => $status, 'pid' => $the_post_id, 'ic' => $image_credit]);
    header("Location: profile.php");
}
?>
<div class="post">
    <form class="post-card" action="" method="post" enctype="multipart/form-data">
        <!-- <div class="post-card"> -->
        <div class="post-card-content">
            <div class="post-card-img">
                <input class="post-img" name="image" type="text" value="<?php echo $post_image ?>">
                <input class="post-img-credit" name="image_credit" type="text" value="<?php echo $image_credit ?>">
                <input class="post-tags" name="post_tags" type="text" value="<?php echo $post_tags ?>">
                <input class="post-ext-link" name="external_link" type="text" value="<?php echo $post_external_link ?>">
                <select class="post-category" name="post_category_id" id="post_category">
                    <?php
                    $sql = "SELECT * FROM categories";
                    $stmt = $connection->prepare($sql);
                    $stmt->execute();
                    $cats = $stmt->fetchAll();

                    foreach ($cats as $cat) {
                        $cat_id = $cat->cat_id;
                        $cat_title = $cat->cat_title;
                        if ($cat_id == $post_category) {
                            echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                        } else {
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="post-card-body">
                <input class="post-heading" name="title" type="text" value="<?php echo $post_title ?>">
                <textarea class="post-content" name="post_content" id="body" cols="30" rows="10"><?php echo $post_content ?></textarea>
            </div>
        </div>
        <div class="post-card-footer">
            <span>Max character count of Heading should not exceed 127 and of post 506, (Space also
                counts).</span>
            <input class="post-submit" type="submit" value="Update" name="update_post">
        </div>
        <!-- </div> -->
    </form>
</div>


<?php include "./includes/footer.php" ?>