<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/myhome.partial.php
 */
require 'partial/header.php';
?>

<main class="main">

    <?php require 'partial/sidebar-myhome.php'; ?>

    <div class="content">
        <?php
        require 'partial/message.php';
        require "partial/myhome-".$page['body']['action'].".php";
        ?>
    </div>

</main>
