<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/admin-replypreview.php
 */
//print_r($value);
?>
<tr>
    <td><input type="checkbox" name="chk[<?= $value->rid ?>]"></td>
    <td><?= $value->rid ?></td>
    <td><?= $value->lzuser ?></td>
    <td><a href="<?= $baseurl ?>/showtopic.php?tid=<?= $value->id ?>" target="_blank">
            <?= $value->id ."/" .substr(Post::getReplyTopic($value->id)->title,0,50) ?>
        </a>
    </td>
    <td><?= substr($value->reply,0,70) ?></td>
    <td><?= $value->replytime ?></td>
</tr>