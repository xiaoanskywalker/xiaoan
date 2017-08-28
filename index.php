<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2 1
 * Author: Xiaoan
 * File: /index.php
 */
/*配置文件检测*/
if ((file_exists("./common/config.php")) == false) {
    header("location:./install/install.php");
}

/*基础参数赋值*/
$baseurl = '.';
$body = 'index.partial.php';
$page['body']['class'] = 'index';

/*引入初始文件*/
require_once './common/includes/common.php';
session_start();

/*帖子分页预处理*/
$pge=Site::pagefirst(@$_REQUEST["page"]);

/*获取用户*/
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}else{
    $user = null;
}

/*获取页码*/
$pagination = array();
Site::pagination($pge,"./?page=");

/*欢迎信息显示*/
$wel = @$_SESSION["welcome"];
if ($wel==1 or $wel==2 or $wel==3 or $wel==8){
    $wel = Site::welcome($wel,$user,$site);
    array_push($page['message']['accept'],$wel);
}
if($wel==4 or $wel==5 or $wel==6 or $wel==7){
    $wel=Site::welcome($wel,$user,$site);
    array_push($page['message']['error'],$wel);
}
unset($_SESSION["welcome"]);

/*发帖模块*/
require './common/includes/newpost.php';

/*获取帖子*/
$discussions = Post::getPage($pge);

/*引入模板*/
require './template/layout.php';