<?php
/*配置文件检测*/
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/install.php");
}
/*基础参数赋值*/
$baseurl = '..';
$body = 'admin.partial.php';

/*引入初始文件*/
require_once "$baseurl/common/includes/common.php";
/*引入Model类*/
require_once "$baseurl/model/Admin.php";

/*帖子分页预处理*/
$pge=Site::pagefirst(@$_REQUEST["page"]);
/*判断用户是否登录*/
session_start();
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}else{
    $_SESSION["welcome"] = 6;
    header("location:../");
}
/*判断用户是否为管理员*/
if($user->admingp == 0){
    $_SESSION["welcome"] = 7;
    header("location:../");
}
/*判断action参数是否合法*/
$action = array("index","setting","topic","user");
$page['body']['action'] = @$_REQUEST["action"];
if (!(in_array($page['body']['action'] , $action))){
    $page['body']['action'] = 'index';
}
/*判断是否进行管理员二次登录*/
if ($_SESSION["admin"] == null) {
    $page['body']['action'] = 'login';
}
/*欢迎信息显示*/
$wel = @$_SESSION["welcome"];
if ($wel==1){
    $wel=Site::welcome($wel,$user,$site);
    array_push($page['message']['accept'],$wel);
}
/*if($wel==4 or $wel==5 or $wel==6 or $wel==7){
    $wel=Site::welcome($wel,$user,$site);
    array_push($page['message']['error'],$wel);
}*/
unset($_SESSION["welcome"]);

/*导入具体操作代码*/
require '../common/includes/admin-inculdes.php';
/*获取页码*/
$pagination = array();
Site::pagination($pge,"./myhome.php?action=".$page['body']['action']."&page=");


$page['body']['class'] = 'admin';
$page['header']['title'] = '管理中心';
/*引入模板*/
require '../template/layout.php';