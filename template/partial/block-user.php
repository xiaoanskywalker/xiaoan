<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/block-user.php
 */
?>
<div class="tab-pane fade active in" id="newid3" style="display: none;">
    <form class="form-inline" name="topicbin" role="form" action="" method=post>
        <table class="table">
            <tr>
                <td>勾选</td>
                <td>被封禁用户名</td>
                <td>开始封禁时间</td>
                <td>结束封禁时间</td>
                <td>操作管理员</td>
            </tr>
            <?php
            foreach ($block as $value){
                require "block-userlist.php";
            }
            ?>
        </table>

        <input name="endblock" type = "submit" class="btn btn-success"  value = "解封所选用户" >
    </form>
</div>
