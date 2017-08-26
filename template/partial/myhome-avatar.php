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
        <td>当前头像</td>
        <td>上传头像</td>
    </tr>
    <tr>
        <td>
            小图(  50px*  50px)<img src="<?= $avatar ?>" height="50" width="50"><p></p>
            中图(100px*100px)<img src="<?= $avatar ?>" height="100" width="100"><p></p>
            大图(150px*150px)<img src="<?= $avatar ?>" height="150" width="150">
        </td>
        <td>
            <form enctype="multipart/form-data" action="" method="post">
                <input name="myFile" type="file" accept="image/*"><p></p>
                <input name="avatar" type="submit" value="上传头像" class="btn btn-success">
            </form>
        </td>
    </tr>
</table>

