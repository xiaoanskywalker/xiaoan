<?php
session_start();
require_once("../common/config.php");
require_once("../common/conn.php");
$user=@$_SESSION["user"];
if($user==null){header("Location:../user/login.php");}
$row=mysql_fetch_row(mysql_query("SELECT * FROM wtb_users WHERE usr='$user'"));
if ($row[4]==0){header("Location:../");}
/* $row[4]：数据表wtb_users 字段admingp结果
 * $row[4]=0：该用户非平台管理员，不拥有管理权限
 * $row[4]=1：该用户为平台普通管理员，拥有部分管理权限
 * $row[4]=2：该用户为平台超级管理员，拥有全部管理权限
*/
?>
<html>
    <head>
        <title>小安社区管理中心</title>
        <link rel="stylesheet" type="text/css" href="../common/css/home.css" />
        <link rel="stylesheet" href="../common/css/bootstrap.css">
        <style>
        body {background-image:url(../common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <script src="../common/js/jquery.min.js"></script>
        <script src="../common/js/bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html;charset=gb2312">
    </head>
    <body onload="systemTime()">
        <div id="myhome">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">首页</a></li>
                <li class="active"><a href="./myhome.php">管理中心</a></li>
                </ol>
            </div>
            <?php
            if(@$_SESSION["admin"]==null){
            require_once './includes/admin_login.php';
            exit;}
            ?>
            <div id="funlist">
                <div id="mainzt">全局管理<p></div>
                <a href="./index.php?action=index">管理中心首页</a><p><p>
                <a href="./index.php?action=serverinfo">服务器详细信息</a><p>
                <a href="./index.php?action=settings">站点基本设置</a><p>
                <div id="mainzt">帖子管理<p></div>
                <a href="./index.php?action=topics">主题帖管理</a><p><p>
                <div id="mainzt">用户管理<p></div>
                <a href="./index.php?action=users">用户管理</a><p>
            </div>
            <?php
            $action=@$_REQUEST["action"];
            if($action=="serverinfo"){
                require_once './includes/admin_serverinfo.php';
            }
            elseif($action=="settings"){
                require_once './includes/admin_settings.php';
            }
            elseif($action=="topics"){
                require_once './includes/admin_topics.php';
            }
            elseif($action=="users"){
                require_once './includes/admin_users.php';
            }/*
            elseif($action=="changepwd"){
                require_once './includes/myhome_changepwd.php';
            }
            else{
                require_once './includes/admin_index.php';
            }*/
            ?>
        </div>
    </body>
</html>