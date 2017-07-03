<?php require 'partial/header.php'; ?>

<main class="main">

    <?php require 'partial/sidebar-admin.php'; ?>

    <div class="content">
        <?php
        require 'partial/message.php';
        require "partial/admin-".$page['body']['action'].".php";
        ?>
    </div>

</main>
