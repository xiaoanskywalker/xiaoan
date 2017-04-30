<?php require 'partial/header.php'; ?>

<main class="main">

    <?php require 'partial/sidebar-myhome.php'; ?>

    <div class="content">
        <?php
        require "partial/myhome-".$page['body']['action'].".php";
        require 'partial/message.php';
        ?>
    </div>

</main>
