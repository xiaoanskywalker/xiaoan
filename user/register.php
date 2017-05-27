<?php
require_once '../common/conn.php';
require_once '../model/Site.php';
require_once '../model/User.php';

if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
session_start();

if ($_SESSION["user"]) {
    $_SESSION["welcome"]=5;
    header("location:../index.php");
}

$page = array();

$page['message'] = array();
$page['message']['error'] = array();

if (!empty($_POST['log'])) {
    $usr = $_POST["username"];
    $pwd = $_POST["password"];
    $pwd2 = $_POST["password2"];
    $eml = $_POST["email"];
    $code = $_POST["checkcode"];

    if (empty($usr)) {
        array_push($page['message']['error'], '用户名为空');
    }
    if (empty($pwd)) {
        array_push($page['message']['error'], '密码为空');
    }
    if (empty($pwd2)) {
        array_push($page['message']['error'], '密码为空');
    }
    if ($pwd != $pwd2) {
        array_push($page['message']['error'], '密码输入不一致');
    }
    if (empty($eml)) {
        array_push($page['message']['error'], '邮箱为空');
    }
    if (strstr($eml, "@") == false) {
        array_push($page['message']['error'], '邮箱格式错误');
    }

    $check = Site::checkcode($code);
    if ($check==0){
        array_push($page['message']['error'], '验证码错误');
    }

    $pwd=md5($pwd);//密码MD5加密
    if (empty($page['message']['error'])) {
        try {
            $user = User::register($usr, $pwd, $eml,0);
            $_SESSION["user"] = $user;
            $_SESSION["welcome"]=3;
            header("location:../index.php");
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }

    }
}

$site = Site::get();


$baseurl = '..';
$body = 'register.partial.php';

$page['body'] = array();
$page['body']['class'] = 'register';

$page['header'] = array();
$page['header']['title'] = '注册，探索崭新世界!';

$page['sidebar'] = array();
$page['sidebar']['content'] = 'sidebar-login.php';

require '../template/layout.php';


