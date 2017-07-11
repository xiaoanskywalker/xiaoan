<?php
/**
 * Softwave name:Xiaoanbbs
 * Last modify version:0.5.0
 * Author: Xiaoan
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
    echo ("Access denied.");
}
$page['body']['action'] = @$_REQUEST["ac"];
if($page['body']['action'] == "tt"){
    Admin::changetopictype(@$_REQUEST["tid"],@$_REQUEST["tp"]);
    echo  ("操作成功");
}else{
    echo  ("System error.");
}
?>
<a href="<?= $baseurl ?>">返回</a>
