<?php require_once("config.php"); ?>

<div class="sidebar">
    <div class="sidebar-icons">
        <?php
        //  Take all categories to show in sidebar.
        $sql = "SELECT * FROM categories";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $cats = $stmt->fetchAll();

        foreach ($cats as $cat) {
            $cat_id = $cat->cat_id;
            $cat_title = $cat->cat_title;
            $cat_image = $cat->cat_image;

        ?>

            <a href="./category.php?category=<?php echo $cat_id ?>" class="sidebar-icon">
                <img src="./assets/images/sidebar-icon/<?php echo $cat_image ?>" alt="sidebar-icons" />
                <span class="sidebar-span"><?php echo $cat_title ?></span>
            </a>
        <?php } ?>
    </div>

    <div class="sidebar-footer">
        <a href="mailto:contact@gseventy.com" class="s-a">Contact us</a>
        <a href="mailto:team@gseventy.com" class="wfu" style="display: none;">Write for us, mail us why?</a>
        <p class="s-a">&copy;2020 GSEVENTY</p>
        <button class="sidebar-btn open" onclick="openSidebar()"><i class="fas fa-bars" style="font-size:32px; margin-left:2px;"></i></button>
        <button class="sidebar-btn close" onclick="closeSidebar()"><i class="fas fa-bars" style="font-size:32px; margin-left:2px; color:lime;"></i></button>
    </div>
</div>