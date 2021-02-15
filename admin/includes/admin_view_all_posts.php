<?php ob_start(); ?>
<?php include "../includes/config.php" ?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Date</th>
            <th>External Link</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $status = 'online';
        $sql = 'SELECT * FROM posts WHERE status = :st ORDER BY post_id DESC';
        $stmt = $connection->prepare($sql);
        $stmt->execute(['st' => $status]);
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
        ?>
            <?php echo "<tr>" ?>
            <td><?php echo $post_id ?></td>
            <td><?php echo $post_author ?></td>
            <td><?php echo $post_title ?></td>

            <?php
            $sql = 'SELECT * FROM categories WHERE cat_id = :pci ';
            $stmt = $connection->prepare($sql);
            $stmt->execute(['pci' => $post_category]);
            $cats = $stmt->fetchAll();

            foreach ($cats as $cat) {
                $cat_title = $cat->cat_title;
                echo "<td>$cat_title</td>";
            }
            ?>

            <td> <img width="100" src="<?php echo $post_image ?>" alt=""> </td>
            <td><?php echo $post_tags ?></td>
            <td><?php echo $post_date ?></td>
            <td><a href="<?php echo $post_external_link ?>">Link</a></td>
            <td><a href="admin-posts.php?delete=<?php echo $post_id ?>">Delete</a></td>
            <td><a href="admin-posts.php?source=edit_post&p_id=<?php echo $post_id ?>">Edit</a></td>
            <?php echo "</tr>" ?>
        <?php } ?>

    </tbody>
</table>

<?php
//  Delete Post
if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];

    $status_offline = 'offline';
    $sql = "UPDATE posts SET status = :st WHERE post_id = :pid";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['st' => $status_offline, 'pid' => $the_post_id]);
    header("Location: ./admin-posts.php");
}
?>