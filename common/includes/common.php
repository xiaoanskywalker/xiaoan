<?php
//ini_set('date.timezone','Asia/Shanghai');//设置时区
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