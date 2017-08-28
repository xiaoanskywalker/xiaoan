<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2 1
 * Author: Xiaoan
 * File: /template/partial/user-list.php
 */
?>
<div class="tab-pane fade active in" id="adminid">
    <form class="form-inline" name="topicbin" role="form" action="" method=post>
        <table class="table">
            <tr>
                <td>勾选</td>
                <td>UID</td>
                <td>用户名</td>
                <td>注册时间</td>
                <td>用户组</td>
            </tr>
            <?php
            //TODO 显示每个用户的头像
            foreach ($users as $value){
                require "admin-userpreview.php";
            }
            ?>
        </table>
        <?php if($user->admingp == 2){ ?>
        <input name="delusr" type = "submit" class="btn btn-danger"  value = "删除所选用户" >&nbsp;
        <input name="usrtyp" type = "submit" class="btn btn-success"  value = "设置" >所选用户的用户组至
        <select class="form-control" name="usrsel">
            <option value ='0'>普通用户</option>
            <option value ='1'>普通管理员</option>
        </select>
        <?php } ?>
    </form>
</div>
