<?php
session_start();
/*用户*/
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}else{
    header("location:../");
}
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
require_once '../common/conn.php';
require_once '../model/Site.php';
require_once '../model/User.php';
require_once '../model/Home.php';

$site = Site::get();
$page = array();


$baseurl = '..';
$body = 'myhome.partial.php';

$page = array();

$page['body'] = array();
$page['body']['class'] = 'index';

$page['header'] = array();
$page['header']['title'] = $site->description;
require '../template/layout.php';
