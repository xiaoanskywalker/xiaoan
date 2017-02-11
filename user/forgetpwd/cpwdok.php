<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>找回密码-更改密码</title>
<center>
<div id="login">
<h2>更改密码</h2><p>
<?php 
/*小安云平台-微贴吧 找回密码更改密码执行页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}		
$pwd1=md5(@$_POST['pwd1']);
$pwd2=md5(@$_POST['pwd2']);
if($pwd1=="d41d8cd98f00b204e9800998ecf8427e"){die("<font color='red'><b>密码不能为空！</b></font><a href='./' >返回</a>");}
if($pwd1!=$pwd2){die("<font color='red'><b>两次密码不一致！</b></font><a href='./' >返回</a>");}
$sql = "update wtb_users set pwd='".$pwd1."' where email='".$_SESSION["useremail"]."'";
$res = mysql_query($sql);
if(!$res){die("错误：无法连接到数据库!<a href='../'>返回</a>");} 
echo"<font color='green'><b>密码重置成功！</b></font>";
?>
&nbsp;<a href="../login.php">登陆帐号</a>
</div>
</center>
</body>