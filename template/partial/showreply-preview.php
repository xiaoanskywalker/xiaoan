<div class="discussion">
    <div class="avatar-area">
        <?php
        //TODO 获取每个发帖用户的头像
        //TODO 点击头像、名称进入用户主页
        ?>
        <a href="#"><img src="<?= $baseurl ?>/static/img/avatar.jpg" class="avatar"
                         alt="<?= $top->username ?>"></a>
    </div>

    <div class="profile">
        <h3 class="title">
            <a href=".<?= $top->url ?>"><?= $top->title ?></a>
        </h3>
        <div class="preview">
            <?= $top->content ?>
        </div>
        <div class="info">
            <a href="#" class="author"><?= $top->username ?></a>
            <span class="time"><?= $top->getDate() ?></span>
        </div>
    </div>

    <?php
    //TODO 获取每个帖子评论数量
    ?>
    <div class="count"><i class="zmdi zmdi-comments"></i>NaN</div>
</div>