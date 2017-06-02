<center><h4>个人信息管理</h4></center>
<?php
$info=Home::myinfo($user->id);
$sex = $info->sex;
//print_r($info);
?>
<form name="info" action="" method=post>
    <table class="table">
        <tr>
            <td>
                <b>用户名:<p></b><?= $user->name ?>
            </td>
            <td>
                <b>uid:<p></b><?= $user ->id ?>
            </td>
            <td>
                <b>性别：<p></b><input type="radio" name="sex" id="man" value="1" <?php if($sex==1) echo " checked=\"checked\""; ?> /> 男
                <input type="radio" name="sex" id="woman" value="2" <?php if($sex==2) echo " checked=\"checked\""; ?> /> 女
            </td>
            <td>
                <b>生日:</b><input type="date" name="date" class="form-control" value="<?= $info->birthday ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <b>注册时间：<p><?= $info->regtime ?></b>
            </td>
            <td>
                <b>电子邮箱：</b><input type = "text" class="form-control" name="email" value="<?= $info->email ?>" required>
            </td>
            <td>

            </td>
        </tr>
    </table>
    <input name="info" type=submit value="提交" class="btn btn-success">
</form>
