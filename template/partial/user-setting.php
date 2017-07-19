<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/user-setting.php
 */
?>
<div class="tab-pane fade" id="newid" style="display: none;">
    <form name="usersetting" action="" method=post>
        <table class="table">
            <tr>
                <td>是否允许注册</td>
                <td>
                    <input type="radio" name="allowreg" id="allow" value="1" checked="checked"  <?php if(Site::ifopen()->allowreg == 1) echo " checked=\"checked\""; ?>/> 允许
                    <input type="radio" name="allowreg" id="disallow" value="0"  <?php if(Site::ifopen()->allowreg == 0) echo " checked=\"checked\""; ?> /> 不允许
                </td>
                <td>若选择“不允许”，则新用户不能注册本站点</td>
            </tr>
        </table>
        <input name="usersetting" type="submit" value="保存设置" class="btn btn-success">
    </form>
</div>