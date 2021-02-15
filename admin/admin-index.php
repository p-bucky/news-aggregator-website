<?php ob_start(); ?>
<?php include "../includes/config.php" ?>
<?php session_start(); ?>

<!-- HEADER -->
<?php include "includes/admin_header.php" ?>

<!-- CHECK ROLE -->
<!--<?php include "includes/admin_check_role.php" ?>-->

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small><?php echo $_SESSION['user_firstname']; ?></small>
                    </h1>
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