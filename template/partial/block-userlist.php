<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/block-userlist.php
 */
?>
<tr>
    <td><input type="checkbox" name="chk[<?= $value->b_uid ?>]"></td>
    <td><?= User::get($value->b_uid)->name ?></td>
    <td><?= $value->b_startblock ?></td>
    <td><?= $value->b_endblock ?></td>
    <td><?= User::get($value->b_operate)->name ?></td>
</tr>