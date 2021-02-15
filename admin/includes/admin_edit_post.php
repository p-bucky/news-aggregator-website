 <!-- CHECK ROLE -->
 <?php include "includes/admin_check_role.php" ?>

 <?php
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
        $post_category = $_POST['post_category'];
        $post_image = $_POST['image'];
        $post_tags = $_POST['post_tags'];
        $post_external_link = $_POST['external_link'];
        $post_content = $_POST['post_content'];
        $image_credit = $_POST['image_credit'];
        $status = 'online';

        $sql = "UPDATE posts SET post_category_id = :pci, post_title = :pt, post_image = :pim, post_content = :pc, external_link = :el, post_tags = :ptag, status = :st, image_credit = :ic WHERE post_id = :pid";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['pci' => $post_category, 'pt' => $post_title, 'pim' => $post_image, 'pc' => $post_content, 'el' => $post_external_link, 'ptag' => $post_tags, 'st' => $status, 'pid' => $the_post_id, 'ic' => $image_credit]);
    }
    ?>

 <form action="" method="post" enctype="multipart/form-data">

     <div class="form-group">
         <label for="title">Post Title</label>
         <input value="<?php echo $post_title ?>" type="text" class="form-control" name="title">
     </div>

     <div class="form-group">
         <label for="post_category">Post Category Id</label> <br>
         <select name="post_category" id="post_category">
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

     <div class="form-group">
         <label for="post_image">Post Image</label>
         <input value="<?php echo $post_image ?>" type="text" class="form-control" name="image">
     </div>

     <div class="form-group">
         <label for="image_credit">Image Credit</label>
         <input value="<?php echo $image_credit ?>" type="text" class="form-control" name="image_credit">
     </div>

     <div class="form-group">
         <label for="post_tags">Post Tags</label>
         <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
     </div>

     <div class="form-group">
         <label for="title">External Link</label>
         <input value="<?php echo $post_external_link ?>" type="text" class="form-control" name="external_link">
     </div>

     <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"><?php echo $post_content ?></textarea>
     </div>

     <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
     </div>

 </form>