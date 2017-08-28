<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/showtopic-list.php
 */
?>
<div class="discussion-list">
    <ul class="discussions">
        <?php
        //TODO 显示回复的楼层数
        if($user->admingp != 0 ){
            require "topic-manage.php";
        }
        require "showreply-topic.php";
        foreach ($reply as $replys) {
            ?>
            <li>
                <?php require 'showreply-preview.php'; ?>
            </li>
            <?php
        }
        ?>
    </ul>
</div>