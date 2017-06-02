<?php
/*设置PHP时区为东八区
若访问站点时服务器报错It is not safe to rely on the system's timezon等字样请取消下一行的注释*/
//ini_set('date.timezone','Asia/Shanghai');
/*引入Model类*/
require $baseurl.'/common/conn.php';
require $baseurl.'/model/Site.php';
require $baseurl.'/model/User.php';
/*基本参数赋值*/
$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
$page = array();
$page['message'] = array();
$page['message']['accept'] = array();
$page['message']['error'] = array();
$page['body'] = array();
$page['header'] = array();
$page['sidebar'] = array();
/*获取站点信息 */
$site = Site::get();
$page['header']['title'] = $site->description;