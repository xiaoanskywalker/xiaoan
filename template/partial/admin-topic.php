<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/admin-topic.php
 */
$topicbin = Admin::topicbin($pge);
$replybin = Admin::replybin($pge);
?>
<center>
    <h4>帖子管理</h4>
</center>

<div id="fundetail">
    <div class="col-md-9" role="main">
        <ul class="nav nav-tabs" id="PageTab">
            <li class="active">
                <a href="#adminid" data-toggle="tab" onclick="mytopic()" aria-expanded="true">主题回收站</a>
            </li>
            <li class="">
                <a href="#newid" data-toggle="tab" onclick="myreply()" aria-expanded="false">回帖回收站</a>
            </li>
            <?php if($user->admingp == 2){ ?>
            <li class="">
                <a href="#newid2" data-toggle="tab" onclick="topicsetting()" aria-expanded="false">帖子设置</a>
            </li>
            <?php } ?>
        </ul><br>
        <?php
        require"topic-bin.php";
        require "reply-bin.php";
        if($user->admingp == 2){
            require "topic-setting.php";
        }
        require 'pagination.php';
        ?>
    </div>
</div>

