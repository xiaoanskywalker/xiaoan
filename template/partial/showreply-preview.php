<?php
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
            </div>
        </div>
    </div>
</li>