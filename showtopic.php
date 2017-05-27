<?php
/*配置文件检测*/
if ((file_exists("./common/config.php")) == false) {
    header("location:./install/");
}
/*引入初始文件*/
require_once './common/includes/common.php';
/*引入Model类*/
require_once './model/Post.php';

session_start();
/*帖子分页帖子ID预处理*/
$pages=Site::pagefirst(@$_REQUEST["page"]);
$tid=Site::pagefirst(@$_REQUEST["tid"]);
/*获取站点信息 */
$site = Site::get();
/*获取用户*/
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}
/*获取回复*/;
$topic=Post::getReplyTopic($tid);
/*获取页码*/
$pagination = array();
Site::pagination($pages,"./showtopic.php?tid=$tid&page=");
/*参数赋值*/
$page['body']['class'] = 'index';
$page['header']['title'] = $site->description;
$baseurl = '.';
$body = 'showtopic.partial.php';
/*欢迎信息显示*/
$wel=@$_SESSION["welcome"];
if ($wel==1 or $wel==2 or $wel==3){
    $wel=Site::welcome($wel,$user,$site);
    array_push($page['message']['accept'],$wel);
}
if($wel==4 or $wel==5){
    $wel=Site::welcome($wel,$user,$site);
    array_push($page['message']['error'],$wel);
}
/*回帖模块*/
require './common/includes/newpost.php';
/*引入模板*/
require './template/layout.php';