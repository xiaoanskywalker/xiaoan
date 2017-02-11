<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>找回密码-验证邮箱</title>
<center>
<div id="login">
<h2>验证邮箱</h2><p>
<?php 
/*小安云平台-微贴吧 找回密码验证邮箱页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}	
$email=@$_POST['email'];
$code=md5(@$_POST['code']);
if($email==null){die("<font color='red'><b>请输入用户名或邮箱！</b></font><a href='./' >返回</a>");}
if($code=="d41d8cd98f00b204e9800998ecf8427e"){die("<font color='red'><b>请输入验证码！</b></font><a href='./' >返回</a>");}
if($code!=$_SESSION["verification"]){die("<font color='red'><b>验证码错误！</b></font><a href='./' >返回</a>");}
if(strstr($email,"'")){die("<font color='red'><b>用户名有非法字符！</b></font><a href='./' >返回</a>");}
require_once("../../conn.php");//包含数据库连接文件
$sql = "SELECT * FROM wtb_users WHERE usr = '$email' or email = '$email'";
$res = mysql_query($sql);
if(!$res){die("错误：无法连接到数据库!<a href='../'>返回</a>");} 
$rows=mysql_num_rows($res);
if(!$rows){die("<font color='red'><b>用户名或邮箱不存在！</b></font><a href='./' >返回</a>");}
$row=mysql_fetch_row($res);
?>
<script  type="text/javascript">
alert("我们已向您的邮箱<?php
echo substr($row[3],0,3);
$str=strlen($row[3])- 11;
$i=1;//初始化累加器值
while($i<=$str)
{echo "*";$i++;}
echo substr($row[3],strlen($row[3])- 8,strlen($row[3]));
?>发送一条验证信息，请将您收到的验证码输入下面的输入框。");
</script>
<?php
//$_SESSION["useremail"]=$row[3];
$emailcode=md5($row[1].$row[2].rand(1, 1000));
$post=substr($emailcode,0,8);
$_SESSION["email"]=$post;
require_once("sendmail.php");
?>
<form name="login" action="changepwd.php" method=post>
邮箱验证码:<input type=text name="ck"  style="border:0px;border-bottom:red 2px solid;background:none;outline: none;"><p>
<p>
<input name="log" type=submit value="继续">&nbsp;<a href="./">返回</a>&nbsp;
</form>
</div>
</center>
</body>