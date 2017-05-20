<?php
//TODO 回帖成功页
/*配置文件检测*/
if ((file_exists("./common/config.php")) == false) {
    header("location:./install/");
}
/*引入Model类*/
require_once './common/conn.php';
require_once './model/Site.php';
require_once './model/User.php';
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
Site::pagination($page,"./showtopic.php?tid=$tid&page=");
/*参数赋值*/
$page = array();
$page['message'] = array();
$page['message']['accept'] = array();
$page['message']['error'] = array();
$page['body'] = array();
$page['body']['class'] = 'index';
$page['header'] = array();
$page['header']['title'] = $site->description;
$baseurl = '.';
$body = 'showtopic.partial.php';
/*欢迎信息显示*/
$wel=@$_REQUEST["welcome"];
if ($wel==1 or $wel==2 or $wel==3){
    $wel=Site::welcome($wel,$user,$site);
    array_push($page['message']['accept'],$wel);
}
if($wel==4 or $wel==5){
    $wel=Site::welcome($wel,$user,$site);
    array_push($page['message']['error'],$wel);
}
/*回帖模块*/
if (!empty($_POST['send'])) {
    $reply = $_POST["reply"];
    if (empty($reply)) {
        array_push($page['message']['error'], '回帖内容为空');
    }
    if (empty($user)) {
        array_push($page['message']['error'], '用户未登录');
    }
    /*执行数据库中的插入回复帖操作*/
    if (empty($page['message']['error'])) {
        try {
            $doreply = Post::newReply($tid,$reply);
        } catch (Exception $e) {
            array_push($page['message']['accept'], $e->getMessage());
        }

    }
}
/*引入模板*/
require './template/layout.php';