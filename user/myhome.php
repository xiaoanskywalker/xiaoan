<?php
/*配置文件检测*/
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
/*引入Model类*/
require_once '../common/conn.php';
require_once '../model/Site.php';
require_once '../model/User.php';
require_once '../model/Home.php';
/*获取站点信息*/
$site = Site::get();
/*判断用户是否登录*/
session_start();
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}else{
    header("location:../");
}
/*参数赋值*/
$baseurl = '..';
$body = 'myhome.partial.php';

$page = array();
$page['message'] = array();
$page['message']['accept'] = array();
$page['message']['error'] = array();

$page['body'] = array();
$page['body']['class'] = 'index';//获取action参数
$page['body']['nunber'] = 0;
$page['body']['action'] = @$_REQUEST["action"];
/*判断action参数是否合法*/
$page['action'] = array("index","avatar","myinfo","mytopic","message","changepwd");
$arrlength=count($page['action']);
for($x=0;$x<$arrlength;$x++){
    if ($page['body']['action'] == $page['action'][$x]){
        $page['body']['nunber']=1;
    }
}
/*若参数非法则统一为index参数*/
if ($page['body']['nunber'] == 0){
    $page['body']['action']='index';
}

if (!empty($_POST['avatar'])) {
    $upload=Home::Upload("$baseurl/static/img/avatars/$user->name.png");
    //print_r($upload);
    if ($upload[3]==0){
        array_push($page['message']['accept'], '头像设置成功');
    }else{
        array_push($page['message']['error'], '头像设置失败');
    }
}

$page['header'] = array();
$page['header']['title'] = '个人中心';
/*引入模板*/
require '../template/layout.php';

