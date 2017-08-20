<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/admin-index.php
 */

//TODO 管理员操作记录
//TODO 用户申请解封
?>
<center>
    <h4>管理中心首页</h4>
</center>
<div id="fundetail">
    <b>管理控制台</b><br>
    程序版本：Xiaoanbbs V<?= $page["version"] ?>&nbsp;<a href="http://xiaoanbbs.cn/checkupd.php?version=<?= $page["version"] ?>" target="_blank">检查更新</a><p>
    官方网站：<a href="http://xiaoanbbs.cn" target="_blank">http://xiaoanbbs.cn</a><br>
    发布站点：<a href="http://weitieba.cf" target="_blank">http://http://weitieba.cf</a><br>
    Github：<a href="https://github.com/tfdogs/xiaoan" target="_blank">https://github.com/tfdogs/xiaoan</a><br>
    开发者：Xiaoan<br>
    管理员：<?= $user->name ?><br>
    用户组：
        <?php
        if($user->admingp == 2){
            echo "超级管理员";
        }else{
            echo "普通管理员";
        }
        if($user->admingp == 2){ ?>
          <hr>
          <b>服务器环境</b><br>
          操作系统：<?php echo php_uname();?><br><p><p>
          解释引擎：<?php echo $_SERVER['SERVER_SOFTWARE'];?><br>
          PHP版本：<?php echo PHP_VERSION;?>
          &nbsp;&nbsp;<a href="<?= $baseurl ?>/common/phpinfo.php" target="_blank">Phpinfo</a><br>
          IP&nbsp;地址：<?php echo GetHostByName($_SERVER['SERVER_NAME']);?><br>
        <?php } ?>
    <hr>
    <b>统计信息</b><br>
    <table class="table">
        <tr>
            <td>用户总数：<?= Admin::getusernum()->usernumber ?></td>
            <td>主题帖总数：<?php echo $t1 = Admin::gettopicnum()->topicnumber; ?></td>
            <td>回复帖总数：<?php echo $t2 = Admin::getreplynum()->topicnumber; ?></td>
        </tr>
        <tr>
            <td>帖子总数：<?= $t1 + $t2 ?></td>
            <td>数据库大小：<?= round((Admin::dbsize(constant('mysql_database'))->dbsize)/1048576,3) ?>MB</td>
        </tr>
    </table>

    <hr>
    <b>操作记录</b><br>
</div>