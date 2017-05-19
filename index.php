<?php
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
/*帖子分页预处理*/
$page=Site::pagefirst(@$_REQUEST["page"]);
/*获取站点信息 */
$site = Site::get();
/*获取用户*/
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}
/*获取帖子*/
$discussions = Post::getPage($page);
/*获取页码*/
$pagination = array();
Site::pagination($page,"./?page=");

$page = array();
$page['message'] = array();
$page['message']['accept'] = array();
$page['message']['error'] = array();

/*发帖模块*/
if (!empty($_POST['send'])) {
    $title = $_POST["title"];
    $topic = $_POST["topic"];


    if (empty($title)) {
        array_push($page['message']['error'], '帖子标题为空');
    }
    if (empty($topic)) {
        array_push($page['message']['error'], '帖子内容为空');
    }
    if (empty($user)) {
        array_push($page['message']['error'], '用户未登录');
    }

    /*执行数据库中的插入主题帖操作*/
    if (empty($page['message']['error'])) {
        try {
            $user = Post::newtopic($title,$topic);
        } catch (Exception $e) {
            array_push($page['message']['accept'], $e->getMessage());
        }

    }
}

/*参数赋值*/
$baseurl = '.';
$body = 'index.partial.php';

$page['body'] = array();
$page['body']['class'] = 'index';

$page['header'] = array();
$page['header']['title'] = $site->description;
/*引入模板*/
require './template/layout.php';