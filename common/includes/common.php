<?php
/*引入Model类*/
require_once '$baseurl/common/conn.php';
require_once './model/Site.php';
require_once './model/User.php';
/*基本参数赋值*/
$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
$page = array();
$page['message'] = array();
$page['message']['accept'] = array();
$page['message']['error'] = array();
$page['body'] = array();
$page['header'] = array();