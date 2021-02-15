<?php ob_start(); ?>
<?php session_start(); ?>

<!-- HEADER -->
<?php include "includes/admin_header.php" ?>

<!-- CHECK ROLE -->
<?php include "includes/admin_check_role.php" ?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Categories
                        <small><?php echo $_SESSION['user_firstname']; ?></small>
                    </h1>

                    <div class="col-xs-6">
                        <!-- Add Categories -->
                        <?php include "includes/admin_add_categories.php"; ?>

                        <!-- Update Categories -->
                        <?php
                        if (isset($_GET['update'])) {
                            $cat_id = $_GET['update'];
                            include "includes/admin_update_categories.php";
                        }
                        ?>
                    </div>

                    <!-- Show All Categories -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM categories';
                                $stmt = $connection->prepare($sql);
                                $stmt->execute();
                                $cats = $stmt->fetchAll();

                                foreach ($cats as $cat) {
                                    $cat_id = $cat->cat_id;
                                    $cat_title = $cat->cat_title;
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    // Delete button removed (will update later with full feature)
                                    //echo "<td><a href='admin-categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='admin-categories.php?update={$cat_id}'>Update</a></td>";
                                    echo "<tr>";
                                }
                                ?>

                                <?php
                                // Delete the categories
                                if (isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];
                                    // Delete button removed (will update later with full feature)
                                    // $sql = 'DELETE FROM categories WHERE cat_id = :cid';
                                    // $stmt = $connection->prepare($sql);
                                    // $stmt->execute(['cid' => $the_cat_id]);
                                    header("Location: admin-categories.php");
                                    exit();
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php" ?>