<?php
//TODO 解决用户名为中文的头像上传失败问题
/*配置文件检测*/
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
/*基础参数赋值*/
$baseurl = '..';
$body = 'myhome.partial.php';
$page['header']['title'] = '个人中心';
$page['body']['class'] = 'index';


/*引入初始文件*/
require_once '../common/includes/common.php';
/*引入Model类*/
require_once '../model/Home.php';

/*判断用户是否登录*/
session_start();
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}else{
    header("location:../");
}
/*参数及数组赋值*/
$action = array("index","avatar","myinfo","mytopic","message","changepwd");
$page['body']['action'] = @$_REQUEST["action"];
/*判断action参数是否合法*/
if (!(in_array($page['body']['action'] , $action))){
    $page['body']['action'] = 'index';
}
/*头像上传操作*/
if (!empty($_POST['avatar'])) {
    $upload=Home::Upload("$baseurl/static/img/avatars/$user->name.png");
    //print_r($upload);
    if ($upload[3]==0){
        array_push($page['message']['accept'], '头像设置成功');
    }else{
        array_push($page['message']['error'], '头像设置失败');
    }
}
/*恢复默认头像操作*/
if (!empty($_POST['c-avatar'])) {
    unlink("$baseurl/static/img/avatars/$user->name.png");
    array_push($page['message']['accept'], '默认头像恢复成功');
}
/*引入模板*/
require '../template/layout.php';

