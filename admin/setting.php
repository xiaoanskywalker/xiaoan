<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /admin/setting.php
 */
/*基础参数赋值*/
$baseurl = '..';
$body = 'admin.partial.php';
?>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?= $baseurl ?>/static/css/style.css">
<?php
/*引入初始文件*/
require_once "$baseurl/common/includes/common.php";
/*引入Model类*/
require_once "$baseurl/model/Admin.php";
session_start();
if($_SESSION['admin'] == null){
    echo ("Access denied.");
}
$page['body']['action'] = @$_REQUEST["action"];
if($page['body']['action'] == "topictype"){
    Admin::changetopictype(@$_REQUEST["tid"],@$_REQUEST["tp"]);
    //echo  ("操作成功");
    if(@$_REQUEST["tp"] == 0){
        $gourl = $baseurl;
    }else{
        $gourl = "$baseurl/showtopic.php?tid=".@$_REQUEST["tid"];
    }
    require "$baseurl/template/partial/ok.php";
}else{
    echo  ("System error.");
}