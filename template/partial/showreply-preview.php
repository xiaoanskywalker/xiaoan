<?php
$avatar = User::avatar($row[2],$baseurl);
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