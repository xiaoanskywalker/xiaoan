<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/admin-topic.php
 */
$topicbin = Admin::topicbin($pge);
?>
<center>
    <h4>帖子回收站</h4>
</center>

<div id="fundetail">
    <div class="col-md-9" role="main">
        <ul class="nav nav-tabs" id="PageTab">
            <li class="active">
                <a href="#adminid" data-toggle="tab" onclick="mytopic()" aria-expanded="true">主题回收站</a>
            </li>
            <li class="">
                <a href="#newid" data-toggle="tab" onclick="myreply()" aria-expanded="false">回帖回收站</a></li>
        </ul><br>
        <div class="tab-pane fade active in" id="adminid">
            <form class="form-inline" name="topicbin" role="form" action="" method=post>
                <table class="table">
                    <tr>
                        <td>勾选</td>
                        <td>帖子ID</td>
                        <td>发帖人</td>
                        <td>帖子标题</td>
                        <td>帖子内容</td>
                        <td>发帖时间</td>
                    </tr>
                    <?php
                    foreach ($topicbin as $value){
                        require "admin-topicpreview.php";
                    }
                    ?>
                </table>
                <input name="recovertopics" type = "submit" class="btn btn-success" value = "恢复所选帖子">
            </form>
        </div>
        <div class="tab-pane fade" id="newid" style="display: none;">
            <table class="table">
                <tr>
                    <td>主题帖ID</td>
                    <td>主题帖标题</td>
                    <td>回帖内容</td>
                    <td>发帖时间</td>
                </tr>
            </table>
        </div>
        <?php require 'pagination.php';?>
    </div>
</div>

