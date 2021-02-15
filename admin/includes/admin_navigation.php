    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Home</a>
        </div>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li>
                    <a href="../admin/admin-categories.php">Categories</a>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown">Posts<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts_dropdown" class="collapse">
                        <li>
                            <a href="admin-posts.php?source=all_post">View All Post</a>
                        </li>
                        <li>
                            <a href="../admin/admin-posts.php?source=add_post">Add Post</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>