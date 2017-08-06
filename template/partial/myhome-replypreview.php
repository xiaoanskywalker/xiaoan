<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /template/partial/myhome-replypreview.php
 */
?>
<tr>
    <td><?= $value->tid ?></td>
    <td><a href="<?= "$baseurl/showtopic.php?tid=$value->tid" ?>" target="_blank"><?= substr($value->title,0,50) ?></a></td>
    <td><?= substr($value->reply,0,70) ?></td>
    <td><?= $value->repdate ?></td>

</tr>