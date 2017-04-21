<?php require 'partial/header.php'; ?>

<main class="main">

    <?php require 'partial/sidebar.php'; ?>

    <div class="content">
        <?php
        require 'partial/showtopic-list.php';
        require 'partial/pagination.php';
        if ($_SESSION["user"]!=null){
            require 'partial/new-reply.php';
        }
        //require 'partial/message.php';
        ?>
    </div>

</main>



