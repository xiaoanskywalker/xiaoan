<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/showreply-preview.php
 */
$avatar = User::avatar($replys->lzuser,$baseurl);
?>
<li>
    <div class="discussion">
        <div class="avatar-area">
            <a href="#"><img src="<?= $avatar ?>" class="avatar" alt="1" /></a>
        </div>

        <div class="profile">
            <div class="preview">
                <?= $replys->reply ?>
            </div>
            <div class="info">
                <a href="#" class="author"><?= $replys->lzuser ?></a>
                <span class="time">回复于 <?= $replys->replytime ?></span>
                <?php if($user->admingp != 0){?>
                <a href="<?= $baseurl ?>/admin/setting.php?action=delrep&rid=<?= $replys->rid ?>&tid=<?= $tid ?>">删除帖子</a><br>
                <?php
                //require "blockuser-page.php";
                } ?>
            </div>
        </div>
    </div>
</li>