<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/register.partial.php
 */
require 'partial/header.php';
?>
<main class="main">

    <?php require 'partial/sidebar.php'; ?>

    <div class="content">

        <?php require 'partial/message.php'; ?>

        <?php
        if(Site::ifopen()->allowreg == 1){
            require 'partial/register-box.php';
        }else{
            echo "管理员已关闭注册功能";
        }
        ?>

    </div>

</main>



