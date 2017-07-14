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