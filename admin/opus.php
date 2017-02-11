<meta http-equiv="content-type" content="text/html;charset=gb2312">
<?php 
/*小安微贴吧 用户操作页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！*/ 
session_start();
if(@$_SESSION["user"]==null)
{header("Location:../user/login.php");}
if($_SESSION["admin"]==null)
{header("Location:./adminlogin.php");}
require_once("../conn.php");//包含数据库连接文件
$action=@$_REQUEST['action'];//获取参数

function _del(){
    $uid=@$_REQUEST['uid'];
    if($uid==null){die("<b><font color='red'>UID为空!</font></b><a href='user.php'>返回</a>");}
	$sql = "SELECT * FROM wtb_users WHERE uid='$uid'";
    $rs = mysql_query($sql);
	if(!$rs){die("连接数据库时出现错误！01<a href='user.php'>返回</a>");}
	$row = mysql_fetch_row($rs);
	if($row[1]==$_SESSION["user"])
	  {die("<b><font color='red'>$row[1],您不能删除自己!</font></b><a href='user.php'>返回</a>");}
    if($row[4]=="admin")
	  {die("<b><font color='red'>".$_SESSION["user"].",您不能删除网站管理员$row[1]!</font></b><a href='user.php'>返回</a>");}
    $sql = "DELETE FROM wtb_users WHERE uid='$uid'";
    $rs = mysql_query($sql);
    if(!$rs){die("连接数据库时出现错误！02<a href='user.php'>返回</a>");}
	$sql = "DELETE FROM wtb_userinfo WHERE uid='$uid'";
    $rs = mysql_query($sql);
    if(!$rs){die("连接数据库时出现错误！03<a href='user.php'>返回</a>");}
    echo "<b><font color='green'>用户(uid:$uid,用户名:$row[1])删除成功!</font></b><a href='user.php'>返回</a>";
}

if($action=="del")
{
	 _del();exit;
}
/*
elseif($action=="top")
{
	$sql = "UPDATE wtb_titles SET iftop='yes' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("错误：无法连接到数据库!(3)<a href='topic.php'>返回</a>");}
	echo "<b><font color='green'>置顶成功!</font></b><a href='topic.php'>返回</a>";
}
elseif($action=="ctop")
{
	$sql = "UPDATE wtb_titles SET iftop='no' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("错误：无法连接到数据库!(4)<a href='topic.php'>返回</a>");}
	echo "<b><font color='green'>取消置顶成功!</font></b><a href='topic.php'>返回</a>";
}
elseif($action=="good")
{
	$sql = "UPDATE wtb_titles SET ifgood='yes' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("错误：无法连接到数据库!(5)<a href='topic.php'>返回</a>");}
	echo "<b><font color='green'>加精成功!</font></b><a href='topic.php'>返回</a>";
}
elseif($action=="cgood")
{
	$sql = "UPDATE wtb_titles SET ifgood='no' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("错误：无法连接到数据库!(6)<a href='topic.php'>返回</a>");}
	echo "<b><font color='green'>取消加精成功!</font></b><a href='topic.php'>返回</a>";
}
*/
?>