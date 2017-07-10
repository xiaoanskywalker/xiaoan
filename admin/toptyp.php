<?php
/**
 * Xiaoanbbs 0.4.0
 * Created by Xiaoan
 * File: /admin/toptyp.php
 */
/*基础参数赋值*/
$baseurl = '..';
$body = 'admin.partial.php';

/*引入初始文件*/
require_once "$baseurl/common/includes/common.php";
/*引入Model类*/
require_once "$baseurl/model/Admin.php";
session_start();
if($_SESSION['admin'] == null){
    die ("Access denied.")
}