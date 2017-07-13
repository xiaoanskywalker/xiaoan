<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/admin-topicpreview.php
 */
?>
<tr>
    <td><input type="checkbox" name="chk[<?= $value->t_id ?>]"></td>
    <td><?= $value->t_id ?></td>
    <td><?= $value->t_user ?></td>
    <td><?= substr($value->t_title,0,50) ?></td>
    <td><?= substr($value->t_context,0,70) ?></td>
    <td><?= $value->t_time ?></td>
</tr>