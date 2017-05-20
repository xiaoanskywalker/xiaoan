<?php
/*引入Model类*/
require_once '../common/conn.php';
require_once '../model/Site.php';
require_once '../model/User.php';
/*配置文件检测*/
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
session_start();

if ($_SESSION["user"]) {
    header("location:../index.php?welcome=4");
}

$page = array();

$page['message'] = array();
$page['message']['error'] = array();

if (!empty($_POST['log'])) {
    $uar = $_POST["username"];
    $pwd = $_POST["password"];
    $code = $_POST["checkcode"];

    if (empty($uar)) {
        array_push($page['message']['error'], '用户名为空');
    }
    if (empty($pwd)) {
        array_push($page['message']['error'], '密码为空');
    }

    $check = Site::checkcode($code);
    if ($check==0){
        array_push($page['message']['error'], '验证码错误');
    }

    if (empty($page['message']['error'])) {
        try {
            $user = User::login($uar, $pwd);
            $_SESSION["user"] = $user;
           echo  $gotoo=Site::gotoo(@$_REQUEST["goto"])."&welcome=1";
            header("location:$gotoo");
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }

    }
}

$site = Site::get();


$baseurl = '..';
$body = 'login.partial.php';

$page['body'] = array();
$page['body']['class'] = 'login';

$page['header'] = array();
$page['header']['title'] = '登录，享受更多精彩!';

$page['sidebar'] = array();
$page['sidebar']['content'] = 'sidebar-login.php';

require '../template/layout.php';


