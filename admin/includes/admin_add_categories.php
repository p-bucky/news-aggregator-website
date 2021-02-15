<!-- CHECK ROLE -->
<?php include "admin_check_role.php" ?>

<?php
if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    $cat_image = $_FILES['image']['name'];
    $cat_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($cat_image_temp, "../assets/images/sidebar-icon/$cat_image");

    // Checking if field is empty or not.
    if ($cat_title == "" || empty($cat_title)) {
        echo "This field should not be empty";
    } else {
        $sql = 'INSERT INTO categories(cat_title, cat_image) VALUES(:ct, :ci)';
        $stmt = $connection->prepare($sql);
        $stmt->execute(['ct' => $cat_title, 'ci' => $cat_image]);
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat-title">Add Category</label>
        <input type="text" class="form-control" name="cat_title">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
    </div>
</form>