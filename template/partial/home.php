<?php
$info=Home::myinfo($usr->id);
$sex = Home::heorshe($info->sex);
//print_r($info);
?>
    <table class="table">
        <tr>
            <td>
                <b><?= $sex ?>的用户名:<p></b><?= $user->name ?>
            </td>
            <td>
                <b><?= $sex ?>的uid:<p></b><?= $user ->id ?>
            </td>
            <td>
                <b><?= $sex ?>的生日:<p></b><?= $info->birthday ?>
            </td>
        </tr>
        <tr>
            <td>
                <b><?= $sex ?>的注册时间：<p></b><?= $info->regtime ?>
            </td>
            <td>
                <b><?= $sex ?>的电子邮箱：<p></b><?= $info->email ?>
            </td>
            <td>

            </td>
        </tr>
    </table>
