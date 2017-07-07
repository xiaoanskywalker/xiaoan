<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<?php
/*基础参数赋值*/
$baseurl = '..';
/*引入初始文件*/
require_once "$baseurl/common/includes/common.php";
session_start();
if($_SESSION["admin"] != null){
    phpinfo();
}