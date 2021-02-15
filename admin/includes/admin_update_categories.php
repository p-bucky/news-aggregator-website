<!-- CHECK ROLE -->
<?php include "includes/admin_check_role.php" ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat-title">Update Category</label>

        <?php
        if (isset($_GET['update'])) {
            $cat_id = $_GET['update'];

            $sql = 'SELECT * FROM categories WHERE cat_id = :ci';
            $stmt = $connection->prepare($sql);
            $stmt->execute(['ci' => $cat_id]);
            $cats = $stmt->fetchAll();

            foreach ($cats as $cat) {
                $cat_title = $cat->cat_title;
        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" class="form-control" name="cat_title">
        <?php }
        } ?>
        <?php
        if (isset($_POST['update_category'])) {
            $the_cat_title = $_POST['cat_title'];
            $cat_image = $_FILES['image']['name'];
            $cat_image_temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($cat_image_temp, "../assets/images/sidebar-icon/$cat_image");

            $sql = "UPDATE categories SET cat_title = :ct , cat_image = :ci WHERE cat_id = :cid ";
            $stmt = $connection->prepare($sql);
            $stmt->execute(['ct' => $the_cat_title, 'ci' => $cat_image, 'cid' => $cat_id]);
        }
        ?>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>