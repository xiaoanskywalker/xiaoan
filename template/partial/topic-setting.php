<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/topic-setting.php
 */
?>
<div class="tab-pane fade" id="newid2" style="display: none;">
    <form name="tsettings" action="" method=post>
        <table class="table">
            <tr>
                <td>是否允许发帖</td>
                <td>
                    <input type="radio" name="allow" id="allowed" value="1" <?php if(Site::ifopen()->allowpost == 1) echo " checked=\"checked\""; ?> /> 允许
                    <input type="radio" name="allow" id="disallowed" value="0" <?php if(Site::ifopen()->allowpost == 0) echo " checked=\"checked\""; ?> /> 不允许
                </td>
                <td>若选择“不允许”，则只有管理员才能发帖</td>
            <tr>
                <td>发帖前缀</td>
                <td>
                    <input type=text name="prefix"  value="<?= Post::show_prefix() ?>" class="form-control">
                </td>
                <td>选填选项，以空格为分界，不设前缀则留空</td>
            </tr>
        </table>
        <input name="topicsetting" type="submit" value="保存设置" class="btn btn-success">
    </form>
</div>