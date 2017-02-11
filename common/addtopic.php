<?php
session_start();
if(@$_SESSION["user"]==null){
    die("<script> alert('您还未登录，请登录或注册!');history.go(-1);</script>");
}
require_once("./config.php");
require_once("./conn.php");
$action=$_REQUEST["action"];
if ($action=="newtopic"){ _newtopic();}
elseif ($action=="newreply"){_newreply();}
else{die("<script> alert('无效的参数!');window.navigate('../');</script>");}
function _newtopic(){
    $title=@$_POST['title'];
    $topic=@$_POST['topic'];
    $time = date('Y-m-d h:m:s');
    $user=$_SESSION["user"];
    if ($title && $topic)
    {
        mysql_query("insert into wtb_titles values (null,'$user','$title','$time','$topic','no','no')") or die("<script> alert('执行数据库查询时出现错误，请联系网站管理员！'); window.navigate('../');</script>");
	die("<script> alert('发帖成功!');window.navigate('../');</script>");
    }
    else{die("<script> alert('请输入帖子标题和内容!');window.navigate('../');</script>");}
}
function _newreply(){
    $reply=@$_POST['reply'];
    if ($reply=="                " or $reply==null){die("<script>alert('请输入回复内容!');history.go(-1);</script>");}
    $tid=@$_REQUEST["tid"];
    is_numeric($tid) or die("<script> alert('无效的参数!');history.go(-1);</script>");
    if($tid<=0){die("<script> alert('tid参数非正整数!');history.go(-1);</script>");}
    $tid=round($tid);
    $time = date('Y-m-d h:m:s');
    $user=$_SESSION["user"];
    mysql_query("insert into wtb_reply values (null,'$tid','$user','$reply','$time')") or die("<script> alert('执行数据库查询时出现错误，请联系网站管理员！'); window.navigate('../');</script>");
    die("<script> alert('回帖成功!');history.go(-1);</script>");
}