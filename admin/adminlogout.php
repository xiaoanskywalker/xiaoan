<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<body bgcolor="#F0F8FF">
<title>退出登陆</title>
<center>
<div id="login">
<h2>退出管理登录</h2><p>
退出管理登陆的帐号：<b><?php
 /*小安云平台-微贴吧 用户退出登陆页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！*/ 
session_start();
echo(@$_SESSION["admin"]);
unset($_SESSION["admin"]);//清空名字为admin的session，退出管理登录
 ?>
 </b><p>您已经退出管理登陆。<p>
 <a href="../">返回</a>&nbsp;<a href="./adminlogin.php">重新登陆</a>
 </div>
</center>
<link rel="stylesheet" type="text/css" href="../css/login.css" />
</body>