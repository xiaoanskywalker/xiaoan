<?php require 'partial/header.php'; ?>

<main class="main">

    <?php require 'partial/sidebar.php'; ?>

    <div class="content">
        <?php
        require 'partial/post-list.php';
        require 'partial/pagination.php';
        require 'partial/new-post.php';
        require 'partial/message.php';
        ?>
    </div>

</main>



