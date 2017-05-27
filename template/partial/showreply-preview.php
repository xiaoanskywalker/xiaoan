<?php
$avatar = User::avatar($row[2],$baseurl);
//TODO 点击头像、名称进入用户主页
?>
<li>
    <div class="discussion">
        <div class="avatar-area">
            <a href="#"><img src="<?= $avatar ?>" class="avatar" alt="1" /></a>
        </div>

        <div class="profile">
            <div class="preview">
                <?= $row[3];?>
            </div>
            <div class="info">
                <a href="#" class="author"><?= $row[2]; ?></a>
                <span class="time">回复于 <?= $row[4]; ?></span>
            </div>
        </div>
    </div>
</li>