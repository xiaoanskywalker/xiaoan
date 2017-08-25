<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
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

session_start();
if($_SESSION['user'] == null){
    echo ("Access denied.");
}
$page['body']['action'] = @$_REQUEST["action"];
$page['body']['uid']  = @$_REQUEST["uid"];
$page['body']['tid']  = @$_REQUEST["tid"];
$gourl = "$baseurl/showtopic.php?tid=".@$_REQUEST["tid"];

if($page['body']['action'] == "topictype"){
    Admin::changetopictype($page['body']['tid'],@$_REQUEST["tp"]);
    if(@$_REQUEST["tp"] == 0){
        $gourl = $baseurl;
    }
}elseif($page['body']['action'] == "banuser"){
    $endtime = array();
    $endtime[0] = Admin::getendtime(@$_REQUEST["category"],@$_REQUEST["bantimes"]);//管理员设置的封禁截止时间
    $endtime[1] = User::ifblock($page['body']['uid'])->b_endblock;//数据库中已有的封禁截止时间
    if($endtime[1] == null){
        Admin::newblock($page['body']['uid'],$endtime[0],$_SESSION['user']->id);
    }else{
        if(strtotime($endtime[0]) >= strtotime($endtime[1])){
                Admin::updblock($page['body']['uid'],$endtime[0],$_SESSION['user']->id);
            }
    }
}elseif($page['body']['action'] == "delrep"){
    Admin::recoverreply(@$_REQUEST["rid"],1);
}else{
    echo  ("System error.");
}
require "$baseurl/template/partial/ok.php";