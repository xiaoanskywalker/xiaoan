<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/home.partial.php
 */
require 'partial/header.php';
?>

<main class="main">
    <?php require 'partial/sidebar-home.php'; ?>
    <div class="content">
        <?php
        require 'partial/message.php';
        require "partial/home.php";
        ?>
    </div>

</main>
