<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /template/partial/myhome-message.php
 */
//TODO 系统消息
Home::gettidbyuser($user->name);

print_r($myreply = Home::replyme(11,0,1));
?>
<center><h4>消息中心</h4></center>
<div id="fundetail">
    <div class="col-md-9" role="main">
        <ul class="nav nav-tabs" id="PageTab">
            <li class="active">
                <a href="#adminid" data-toggle="tab" onclick="mytopic()" aria-expanded="true">回复我的</a>
            </li>
            <li class="">
                <a href="#newid" data-toggle="tab" onclick="myreply()" aria-expanded="false">系统消息</a></li>
        </ul><br>
        <div class="tab-pane fade active in" id="adminid">
            <table class="table">
                <tr>
                    <td>原主题帖ID</td>
                    <td>原主题帖标题</td>
                    <td>回复人</td>
                    <td>回复内容</td>
                    <td>回复时间</td>
                </tr>
                <?php
               // foreach ($mytopic as $value){
                 //   require'myhome-topicpreview.php';
              //  }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="newid" style="display: none;">

    </div>
</div>
