<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/top-bar-logged.php
 */
$avatar = User::avatar($user->name,$baseurl);
?>
<li class="dropdown user-nav-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
        <span><?= $user->name ?></span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu user-nav">
        <li class="user-profile">
            <img src="<?= $avatar ?>" class="avatar">
            <span class="username"><?= $user->name ?></span>
        </li>
        <li role="separator" class="divider"></li>
        <li><a href="<?= $baseurl ?>/user/myhome.php">个人中心</a></li>
        <?php
        if($user->admingp != 0){
            if ($_SESSION["admin"] != null){
                echo " <li><a href='$baseurl/admin/'>管理中心&nbsp;已登录</a></li>";
            }else{
                echo " <li><a href='$baseurl/admin/'>管理中心&nbsp;未登录</a></li>";
            }
        }
        ?>
        <li><a href="<?= $baseurl ?>/user/logout.php?goto=<?= $url ?>">退出登录</a></li>
    </ul>
</li>