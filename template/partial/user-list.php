<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/topic-bin.php
 */
?>
<div class="tab-pane fade active in" id="adminid">
    <form class="form-inline" name="topicbin" role="form" action="" method=post>
        <table class="table">
            <tr>
                <td>勾选</td>
                <td>UID</td>
                <td>头像和用户名</td>
                <td>注册时间</td>
                <td>用户组</td>
            </tr>
            <?php
            foreach ($users as $value){
                require "admin-userpreview.php";
            }
            ?>
        </table>
        <input name="recovertopics" type = "submit" class="btn btn-success" value = "恢复所选帖子">
    </form>
</div>