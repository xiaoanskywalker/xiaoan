<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/admin.partial.php
 */
require 'partial/header.php';
?>

<main class="main">

    <?php require 'partial/sidebar-admin.php'; ?>

    <div class="content">
        <?php
        if($page['body']['mode'] == "logout"){
            $_SESSION["welcome"] = 3;
            User::adminlogout();
            header("location:../");
            exit;
        }
        require 'partial/message.php';
        require "partial/admin-".$page['body']['mode'].".php";
        ?>
    </div>

</main>
