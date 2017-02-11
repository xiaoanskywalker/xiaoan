<?php
session_start();
if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
?>
<div id="fundetail">
    <center><h4>管理中心首页</h4></center>
    当前程序版本：小安社区 XiaoanBBS 0.2.0 Alpha<p>
    程序官方网站：<a href="http://xiaoanbbs.cn" target="_blank">http://xiaoanbbs.cn</a><p>
    当前登录的管理员帐号：<?php echo $_SESSION["admin"];?>
    <hr>服务器信息：<br>
    服务器操作系统：<?php echo php_uname();?><br><p><p>
    服务器解释引擎：<?php echo $_SERVER['SERVER_SOFTWARE'];?><br><p>
    PHP版本：<?php echo PHP_VERSION;?><br><p>
    服务器IP地址：<?php echo GetHostByName($_SERVER['SERVER_NAME']);?><br><p>
    服务器域名：<?php echo $_SERVER["HTTP_HOST"];?><br>
</div>
