<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /template/partial/myhome-messagepreview.php
 */
?>
<tr>
    <b><a href="<?= $baseurl ?>/user/home.php?uid=<?= User::getByName($values->replyuser)->id ?>" target="_blank"><?= $values->replyuser ?></a></b>

    在<?= round((strtotime("now") - strtotime($values->repdate))/86400 , 2) ?>天前回复了您的帖子
    <a href="<?= $baseurl ?>/showtopic.php?tid=<?= $values->tid ?>" target="_blank"><?= Post::getReplyTopic($values->tid)->title ?></a>：<br>
        <?= $values->reply ?><p></p>

    <!--
    <td><?= $values->tid ?></td>
    <td><a href="<?= $baseurl ?>/showtopic.php?tid=<?= $values->tid ?>"><?= Post::getReplyTopic($values->tid)->title ?></a></td>
    <td><?= $values->replyuser ?></td>
    <td><?= $values->reply ?></td>
    <td><?= $values->repdate ?></td>
    -->
</tr>