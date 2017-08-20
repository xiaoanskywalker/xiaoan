<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/admin-setting.php
 */
if($user->admingp == 2){
?>
<center>
    <h4>站点基本设置</h4>
</center>
<div id="fundetail">
    <form name="settings" action="" method=post>
        <table class="table">
            <tr>
                <td>是否开启站点</td>
                <td>
                    <input type="radio" name="ifopen" id="man" value="1" <?php if(Site::ifopen()->ifopen == 1) echo " checked=\"checked\""; ?> /> 开启
                    <input type="radio" name="ifopen" id="woman" value="0" <?php if(Site::ifopen()->ifopen == 0) echo " checked=\"checked\""; ?> /> 关闭
                </td>
                <td>若选择“关闭”，则只有管理员才能访问站点</td>
            </tr>
            <tr>
                <td>是否启用验证码</td>
                <td>
                    <input type="radio" name="checkcode" id="man" value="1" <?php if(Site::ifopen()->checkcode == 1) echo " checked=\"checked\""; ?> /> 开启
                    <input type="radio" name="checkcode" id="woman" value="0" <?php if(Site::ifopen()->checkcode == 0) echo " checked=\"checked\""; ?> /> 关闭
                </td>
                <td>推荐开启，防止站点被恶意注册</td>
            </tr>
            <tr>
                <td>网站名称（title）</td>
                <td>
                    <input type=text name="webname"  value="<?= $site->title ?>" class="form-control" required>
                </td>
                <td>必填选项</td>
            </tr>
            <tr>
                <td>关键词（keywords）</td>
                <td>
                    <input type=text name="keywords" value="<?= $site->keywords ?>" class="form-control">
                </td>
                <td>选填选项，可留空</td>
            </tr>
            <tr>
                <td>描述（description）</td>
                <td>
                    <input type=text name="description" value="<?= $site->description ?>" class="form-control">
                </td>
                <td>选填选项，可留空</td>
            </tr>
        </table>
        <input name="settings" type="submit" value="保存设置" class="btn btn-success">
    </form>
</div>
<?php } ?>