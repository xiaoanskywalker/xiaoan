<aside class="sidebar">
    <ul>
        <li><a href="<?= $baseurl ?>/admin/index.php?action=index"><i class="zmdi zmdi-account-box"></i>系统首页</a></li>
        <li><a href="<?= $baseurl ?>/admin/index.php?action=setting"><i class="zmdi zmdi-account-add"></i>基本设置</a></li>
        <li><a href="<?= $baseurl ?>/admin/index.php?action=topic"><i class="zmdi zmdi-account-box"></i>主题帖管理</a></li>
        <li><a href="<?= $baseurl ?>/admin/index.php?action=user"><i class="zmdi zmdi-account-add"></i>用户管理</a></li>
        <!--
        <li><a href="<?= $baseurl ?>/user/myhome.php?action=message"><i class="zmdi zmdi-account-box"></i>消息中心</a></li>
        -->
        <?php
        if ($_SESSION["admin"] != null) { ?>
        <li><a href="<?= $baseurl ?>/admin/index.php?action=logout"><i class="zmdi zmdi-account-add"></i>退出管理</a></li>
        <?php } ?>
    </ul>
</aside>