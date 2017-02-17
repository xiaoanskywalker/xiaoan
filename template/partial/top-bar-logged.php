<li class="dropdown user-nav-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
        <span><?= $user->name ?></span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu user-nav">
        <li class="user-profile">
            <img src="<?= $baseurl ?><?= $user->avatar ?>" class="avatar">
            <span class="username"><?= $user->name ?></span>
        </li>
        <li role="separator" class="divider"></li>
        <li><a href="./user/myhome.php" target="_blank">我的空间</a></li>
        <li><a href="./user/passport.php?action=logout">退出登录</a></li>
    </ul>
</li>