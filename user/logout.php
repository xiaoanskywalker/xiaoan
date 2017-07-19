<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /user/logout.php
 */
session_start();

/*引入初始文件*/
require "../common/includes/common.php";

/*退出登录操作*/
User::logout();

/*得到提示信息*/
$gotoo = Site::gotoo(@$_REQUEST["goto"]);
$_SESSION["welcome"] = 3;

/*返回之前页面*/
header("location:$gotoo");