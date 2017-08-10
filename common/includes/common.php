<?php
/*
 *  * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /common/includes/common.php

 * 设置PHP时区为东八区，若访问站点时服务器报错It is not safe to rely on the system's timezon等字样请取消下一行的注释
 */
//ini_set('date.timezone','Asia/Shanghai');
/*引入Model类*/
require "$baseurl/common/conn.php";
require "$baseurl/model/Site.php";
require "$baseurl/model/User.php";
require "$baseurl/model/Post.php";
require "$baseurl/model/Home.php";
require "$baseurl/model/Admin.php";

/*基本参数赋值*/
$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
$page = array();
$page['message'] = array();
$page['message']['accept'] = array();
$page['message']['error'] = array();
$page['body'] = array();
$page['header'] = array();
$page['sidebar'] = array();
$page['version'] = "0.5.2";

header("X-powered-by:Xiaoanbbs V".$page['version']);
/*获取站点信息 */
$site = Site::get();
$page['header']['title'] = $site->title;
/*获取发帖前缀*/
$per = explode(" ",Post::show_prefix());//获取全部前缀,并将每个前缀导入数组，以空格为分界