<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/sidebar-adminpic.php
 */
?>
<aside class="sidebar">
    <ul>
        <li><a href="<?= $baseurl ?>/admin/index.php?mode=index"><i class="zmdi zmdi-account-box"></i>系统首页</a></li>
        <li><a href="<?= $baseurl ?>/admin/index.php?mode=setting"><i class="zmdi zmdi-account-add"></i>站点设置</a></li>
        <li><a href="<?= $baseurl ?>/admin/index.php?mode=topic"><i class="zmdi zmdi-account-box"></i>帖子管理</a></li>
        <li><a href="<?= $baseurl ?>/admin/index.php?mode=user"><i class="zmdi zmdi-account-add"></i>用户管理</a></li>
        <!--
        <li><a href="<?= $baseurl ?>/user/myhome.php?mode=message"><i class="zmdi zmdi-account-box"></i>消息中心</a></li>
        -->
        <?php
        if ($_SESSION["admin"] != null) { ?>
        <li><a href="<?= $baseurl ?>/admin/index.php?mode=logout"><i class="zmdi zmdi-account-add"></i>退出管理</a></li>
        <?php } ?>
    </ul>
</aside>