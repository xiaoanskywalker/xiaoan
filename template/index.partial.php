<?php require 'partial/header.php'; ?>

<main class="main">

    <?php require 'partial/sidebar.php'; ?>

    <div class="content">
        <?php
        require 'partial/message.php';
        require 'partial/post-list.php';
        require 'partial/pagination.php';
        if ($_SESSION["user"]!=null){
            require 'partial/new-post.php';
        }
        ?>
    </div>

</main>



