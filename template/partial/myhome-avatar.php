<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /template/partial/myhome-avatar.php
 */
?>
<center><h4>修改头像</h4></center>
<table class="table">
    <tr>
        <td>我的头像</td>
        <td>系统默认头像</td>
        <td>上传头像</td>
    </tr>
    <tr>
        <td><img src="<?= $avatar ?>" class="avatar"></td>
        <td><img src="<?= $baseurl ?>/static/img/avatar.jpg" class="avatar"></td>
        <td>
            <form enctype="multipart/form-data" action="" method="post">
                <input name="myFile" type="file" accept="image/*" >
                <input name="avatar" type="submit" value="上传头像" class="btn btn-success">&nbsp;
                <input name="c-avatar" type="submit" value="恢复默认头像" class="btn btn-success">
            </form>
        </td>
    </tr>
</table>

