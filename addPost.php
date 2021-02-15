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
    $post_date = date('Y-m-d H:i:s');

    $status = 'online';

    $sql = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, external_link, post_tags, status, image_credit) VALUES(:pci, :pt,:pa, :pd, :pim, :pc, :el, :ptag, :st, :ic)";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['pci' => $post_category_id, 'pt' => $post_title, 'pa' => $post_author, 'pd' => $post_date, 'pim' => $post_image, 'pc' => $post_content, 'el' => $post_external_link, 'ptag' => $post_tags, 'st' => $status, 'ic' => $image_credit]);
}
?>
<div class="post">
    <form class="post-card" action="" method="post" enctype="multipart/form-data">
        <!-- <div class="post-card"> -->
        <div class="post-card-content">
            <div class="post-card-img">
                <input class="post-img" name="image" type="text" placeholder="Image Link">
                <input class="post-img-credit" name="image_credit" type="text" placeholder="Image Credit">
                <input class="post-tags" name="post_tags" type="text" placeholder="Tags">
                <input class="post-ext-link" name="external_link" type="text" placeholder="News Link">
                <select class="post-category" name="post_category_id" id="post_category">
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
            <div class="post-card-body">
                <input class="post-heading" name="title" type="text" placeholder="Heading...">
                <textarea class="post-content" name="post_content" id="body" cols="30" rows="10" placeholder="Write summarized article here..."></textarea>
            </div>
        </div>
        <div class="post-card-footer">
            <span>Max character count of Heading should not exceed 127 and of post 506, (Space also
                counts).</span>
            <input class="post-submit" type="submit" value="Done Summarized" name="create_post">
        </div>
        <!-- </div> -->
    </form>
</div>