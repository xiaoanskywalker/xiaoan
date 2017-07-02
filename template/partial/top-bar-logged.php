<?php $avatar = User::avatar($user->name,$baseurl); ?>
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
            echo " <li><a href='$baseurl/admin/' target='_blank'>管理中心</a></li>";
        }
        ?>
        <li><a href="<?= $baseurl ?>/user/logout.php?goto=<?= $url ?>">退出登录</a></li>
    </ul>
</li>