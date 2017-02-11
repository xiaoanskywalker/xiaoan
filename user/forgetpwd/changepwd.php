<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>找回密码-更改密码</title>
<center>
<div id="login">
<h2>更改密码</h2><p>
<?php 
/*小安云平台-微贴吧 找回密码更改密码页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}	
if(@$_SESSION["email"]==null)
{ header("Location:../");}	
$emailcode=@$_POST['ck'];
if($emailcode==null){die("<font color='red'><b>请输入邮箱验证码！</b></font><a href='./' >返回</a>");}
if($emailcode!=$_SESSION["email"]){die("<font color='red'><b>邮箱验证码错误！</b></font><a href='./' >返回</a>");}
?>
<form name="login" action="cpwdok.php" method=post>
新&nbsp;&nbsp;密&nbsp;&nbsp;码:<input type=password name="pwd1"  style="border:0px;border-bottom:red 2px solid;background:none;outline: none;" maxlength="15" placeholder="不能超过15位字符"><p>
再输新密码:<input type=password name="pwd2"  style="border:0px;border-bottom:red 2px solid;background:none;outline: none;" maxlength="15" ><p>
<input name="log" type=submit value="修改密码">&nbsp;<a href="./">返回</a>&nbsp;
</div>
</center>
</body>