<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>找回密码</title>
<center>
<div id="login">
<h2>找回密码</h2><p>
<form name="login" action="checkemail.php" method=post>
用户名:<input type=text name="email" placeholder="可以是用户名或邮箱" style="border:0px;border-bottom:red 2px solid;background:none;outline: none;"><p>
验证码:<input type=text name="code" maxlength="4" placeholder="点击图片可换一张" style="border:0px;border-bottom:red 2px solid;background:none;outline: none;"><p>
<p>
<input name="log" type=submit value="继续">&nbsp;<a href="../login.php">返回</a>&nbsp;
<img id="checkpic" onclick="changing();" src='../../source/checkcode.php' />
</form>
<script type="text/javascript" >
function changing(){document.getElementById('checkpic').src="../../source/checkcode.php?"+Math.random();} 
</script>
<?php 
/*小安云平台-微贴吧 找回密码主页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}	
?>
</div>
</center>
</body>