<li><div class="discussion">
    <div class="avatar-area">
        <?php
        //TODO 获取每个发帖用户的头像
        //TODO 点击头像、名称进入用户主页
        ?>
        <a href="#"><img src="<?= $baseurl ?>/static/img/avatar.jpg" class="avatar" alt="1" /></a>
    </div>

    <div class="profile">
        <!--
        <h3 class="title">
            <a href=".<?//= $replies->url ?>"><?//= $replies->title ?></a>
        </h3>
        -->
        <div class="preview">
            <?= $row[3];?>
        </div>
        <div class="info">
            <a href="#" class="author"><?= $row[2]; ?></a>
            <span class="time">回复于 <?= $row[4]; ?></span>
        </div>
    </div>
</div></li>