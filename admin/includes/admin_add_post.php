<!-- CHECK ROLE -->
<?php include "admin_check_role.php" ?>

<?php
if (isset($_POST['create_post'])) {

    $user_id = $_SESSION['user_id'];
    $sql = 'SELECT * FROM users WHERE user_id=:ui';
    $stmt = $connection->prepare($sql);
    $stmt->execute(['ui' => $user_id]);
    $users = $stmt->fetchAll();
    foreach ($users as $user) {
        $username = $user->username;
    }

    $post_title = $_POST['title'];
    $post_author = $username;
    $post_category_id = $_POST['post_category_id'];
    $post_image = $_POST['image'];
    $post_tags = $_POST['post_tags'];
    $post_external_link = $_POST['external_link'];
    $post_content = $_POST['post_content'];
    $image_credit = $_POST['image_credit'];
//  $post_date = date('l jS \of F Y h:i:s A');
    $post_date = date('Y-m-d H:i:s');

    $status = 'online';

    $sql = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, external_link, post_tags, status, image_credit) VALUES(:pci, :pt,:pa, :pd, :pim, :pc, :el, :ptag, :st, :ic)";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['pci' => $post_category_id, 'pt' => $post_title, 'pa' => $post_author, 'pd' => $post_date, 'pim' => $post_image, 'pc' => $post_content, 'el' => $post_external_link, 'ptag' => $post_tags, 'st' => $status, 'ic' => $image_credit]);
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category Id</label> <br>
        <select name="post_category_id" id="post_category">
            <?php
            $sql = "SELECT * FROM categories";
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $cats = $stmt->fetchAll();

            foreach ($cats as $cat) {
                $cat_id = $cat->cat_id;
                $cat_title = $cat->cat_title;
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="text" class="form-control" name="image">
    </div>

    <div class="form-group">
        <label for="image_credit">Image Credit</label>
        <input type="text" class="form-control" name="image_credit">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="title">External Link</label>
        <input type="text" class="form-control" name="external_link">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>