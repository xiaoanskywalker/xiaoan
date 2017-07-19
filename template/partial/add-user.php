<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/add-user.php
 */
?>
<div class="tab-pane fade" id="newid2" style="display: none;">
    <form name="adduser" action="" method=post>
        <table class="table">
            <tr>
                <td>UID</td>
                <td><?= Admin::maxuid()->u_id + 1 ?></td>
                <td>已由系统自动计算，无须设置</td>
            </tr>
            <tr>
                <td>用户名</td>
                <td>
                    <input type=text name="usr"  class="form-control" required>
                </td>
                <td>必填选项</td>
            </tr>
            <tr>
                <td>密码</td>
                <td>
                    <input type=text name="pwd"  class="form-control" required>
                </td>
                <td>必填选项</td>
            </tr>
            <tr>
                <td>电子邮箱</td>
                <td>
                    <input type=text name="email"  class="form-control" required>
                </td>
                <td>必填选项</td>
            </tr>
            <tr>
                <td>管理用户组</td>
                <td>
                    <input type="radio" name="user" id="user" value="0" checked="checked" /> 普通用户
                    <input type="radio" name="user" id="admin" value="1"  /> 普通管理员
                </td>
                <td>必选选项，默认为“普通用户”</td>
            </tr>
        </table>
        <input name="adduser" type="submit" value="添加用户" class="btn btn-success">
    </form>
</div>