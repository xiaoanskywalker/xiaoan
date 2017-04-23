<?php
session_start();
if (!$_SESSION["user"]) {
    header("location:../");
}

require_once '../common/conn.php';
require_once '../model/Site.php';
require_once '../model/User.php';
require_once '../model/Home.php';

$site = Site::get();


$baseurl = '..';
$body = 'myhome.partial.php';

$page['body'] = array();
$page['body']['class'] = 'login';

$page['header'] = array();
$page['header']['title'] = '个人中心';

$page['sidebar'] = array();
$page['sidebar']['content'] = 'sidebar-login.php';

require '../template/layout.php';

