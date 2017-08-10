<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /user/home.php
 */
/*配置文件检测*/
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/install.php");
}

/*基础参数赋值*/
$baseurl = '..';
$body = 'home.partial.php';

/*引入初始文件*/
require_once '../common/includes/common.php';

/*UID预处理*/
$uid = Site::pagefirst(@$_REQUEST["uid"]);

/*获取UID对应的用户名*/
$usr = User::get($uid);

/*获取用户名对应的头像*/
$avatars = User::avatar($usr->name,$baseurl);

/*判断用户是否登录*/
session_start();
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}

/*导入具体操作代码*/
require '../common/includes/myhome-inculdes.php';

/*获取个人信息*/
$info = Home::myinfo($usr->id);
$sex = Home::heorshe($info->sex);
$birthday = Home::getage($info->birthday);
$age = date("Y") - $birthday[0];

/*参数赋值*/
$page['body']['class'] = 'myhome';
$page['header']['title'] = $usr->name.'的个人中心';

/*引入模板*/
require '../template/layout.php';