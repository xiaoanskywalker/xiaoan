<center>
    <h4>管理中心首页</h4>
</center>
<div id="fundetail">
    <?php
    //TODO 检查更新功能
    //TODO 管理员操作记录
    //TODO 帖子总数
    ?>
    <b>管理控制台</b><br>
    程序版本：Xiaoanbbs V0.4.0&nbsp;<a href="#" target="_blank">检查更新</a><p>
    官方网站：<a href="http://xiaoanbbs.cn" target="_blank">http://xiaoanbbs.cn</a><br>
    发布站点：<a href="http://weitieba.cf" target="_blank">http://http://weitieba.cf</a><br>
    Github：<a href="https://github.com/tfdogs/xiaoan" target="_blank">https://github.com/tfdogs/xiaoan</a><br>
    开发者：Xiaoan Group <br>
    管理员：<?= $user->name ?><br>
    用户组：
        <?php
        if($user->admingp == 2){
            echo "超级管理员";
        }else{
            echo "普通管理员";
        }
        ?>
    <hr>
    <b>服务器环境</b><br>
    操作系统：<?php echo php_uname();?><br><p><p>
    解释引擎：<?php echo $_SERVER['SERVER_SOFTWARE'];?><br><p>
    PHP版本：<?php echo PHP_VERSION;?><br><p>
    IP&nbsp;地址：<?php echo GetHostByName($_SERVER['SERVER_NAME']);?><br>
    域&nbsp;名：<?php echo $_SERVER["HTTP_HOST"];?><br>

    <hr>
    <b>统计信息</b><br>
    <hr>
    <b>操作记录</b><br>
</div>