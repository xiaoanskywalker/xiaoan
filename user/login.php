<?php
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
session_start();
//require_once '../common/config.php';
require_once '../common/conn.php';
if ($_SESSION["user"]) {
    //$user = User::getByName($_SESSION["user"]);
    header("location:../");
}

require_once '../common/conn.php';
require_once '../model/Site.php';
require_once '../model/User.php';

$site = Site::get();



$baseurl = '..';
$body = 'login.partial.php';

$page = array();

$page['body'] = array();
$page['body']['class'] = 'login';

$page['header'] = array();
$page['header']['title'] = '登录，享受更多精彩!';

$page['sidebar'] = array();
$page['sidebar']['content'] = 'sidebar-login.php';

require '../template/layout.php';


if(!empty($_POST['log'])){
    $uar = $_POST["username"];
    $pwd = $_POST["password"];
    $user = User::login($uar, $pwd);
    if ($user != null) {
        $_SESSION["user"] = $user;
        header("location:../index.php");
    }else{
        die ("<script> alert('用户名或密码错误!');window.navigate('./login.php');</script>");
    }
}