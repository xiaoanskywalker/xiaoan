<?php
if ((file_exists("./common/config.php")) == false) {
    header("location:./install/");
}
require_once './common/conn.php';
require_once './model/Site.php';
require_once './model/User.php';
require_once './model/Post.php';
session_start();

/*帖子分页帖子ID预处理*/
$pages=Site::pagefirst(@$_REQUEST["page"]);
$tid=Site::pagefirst(@$_REQUEST["tid"]);
/*站点信息 */
$site = Site::get();
/*用户*/
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}
/*回复*/
$topic=Post::getReplyTopic($tid);
/*页码*/
$pagination = array();
Site::pagination($page,"./showtopic.php?tid=$tid&page=");

/*回帖模块*/
if (!empty($_POST['send'])) {
    $reply = $_POST["reply"];

    $page = array();
    $page['message'] = array();
    $page['message']['error'] = array();


    if (empty($reply)) {
        array_push($page['message']['error'], '回帖内容为空');
    }
    if (empty($user)) {
        array_push($page['message']['error'], '用户未登录');
    }

    if (empty($page['message']['error'])) {
        try {
            $doreply = Post::newReply($tid,$reply);
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }

    }
}

$baseurl = '.';
$body = 'showtopic.partial.php';

$page = array();

$page['body'] = array();
$page['body']['class'] = 'index';

$page['header'] = array();
$page['header']['title'] = $site->description;
require './template/layout.php';