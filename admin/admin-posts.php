<?php ob_start(); ?>
<?php session_start(); ?>

<?php include "../includes/config.php" ?>

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
                        Welcome to Posts
                        <small><?php echo $_SESSION['user_firstname']; ?></small>
                    </h1>
                    <?php

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case 'add_post';
                            include "includes/admin_add_post.php";
                            break;

                        case 'edit_post';
                            include "includes/admin_edit_post.php";
                            break;

                        default:
                            include "includes/admin_view_all_posts.php";
                            break;
                    }
                    ?>

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