<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php 
/*小安云平台-微贴吧 管理中心主页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！*/ 
session_start();
if(@$_SESSION["user"]==null)
{header("Location:../user/login.php");}
if($_SESSION["admin"]==null)
{header("Location:./adminlogin.php");}	
?>
<body style="margin:0;">
<div style="width:15%; float:left;background:#F0F8FF;">
<a href="./main.php">管理中心首页</a><p><p>
<a href="./general.php">全局管理</a><p>
<a href="./topic.php">主题贴管理</a><p>
<a href="./reply.php">回复贴管理</a><p>
<a href="./user.php">用户管理</a><p>
<!--<a href="./notice.php">通知中心</a><p>
<a href="./changepwd.php">修改密码</a><p>-->
</div>
<div style="width:85%; float:left;background:#F0FFF0;">
<center><h4><b>管理中心首页</b></h4></center>
当前程序版本：<b>小安微贴吧/for PHP V0.1测试版</b><p>
当前登录的管理员帐号：<b><?php echo $_SESSION["admin"];?></b>
<p><p><hr><b>服务器信息：</b><br>
服务器操作系统：<?php echo php_uname();?><br><p><p>
服务器解释引擎：<?php echo $_SERVER['SERVER_SOFTWARE'];?><br><p>
PHP版本：<?php echo PHP_VERSION;?><br><p>
服务器IP地址：<?php echo GetHostByName($_SERVER['SERVER_NAME']);?><br><p>
服务器域名：<?php echo $_SERVER["HTTP_HOST"];?><br><p>
<a herf="#" onclick="phpinfo()">察看phpinfo</a>&nbsp;<a herf="#" onclick="serverinfo()">察看服务器详细信息</a>
</div>
</body>
<SCRIPT type="text/javascript"> 
function phpinfo(){window.open ('phpinfo.php','newwindow','status=no') }
function serverinfo(){window.open ('serverinfo.php','newwindow','status=no') }
</SCRIPT>