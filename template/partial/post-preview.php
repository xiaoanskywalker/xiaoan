<div class="discussion">
    <div class="avatar-area">
        <?php
        $avatar = User::avatar($discussion->username,$baseurl);
        $uid = User::getByName($discussion->username);
        //TODO 点击头像、名称进入用户主页
        ?>
        <a href="./user/home.php?uid=<?= $uid->id ?>" target="_blank"><img src="<?= $avatar ?>" class="avatar" alt="<?= $discussion->username ?>"></a>
    </div>

    <div class="profile">
        <h3 class="title">
            <a href=".<?= $discussion->url ?>"><?= $discussion->title ?></a>
        </h3>
        <div class="preview">
            <?= substr($discussion->content,0,80)?>
        </div>
        <div class="info">
            <a href="./user/home.php?uid=<?= $uid->id ?>" target="_blank" class="author"><?= $discussion->username ?></a>
            <span class="time"><?= $discussion->getDate() ?></span>
        </div>
    </div>

    <?php
    //TODO 获取每个帖子评论数量
    ?>
    <div class="count"><i class="zmdi zmdi-comments"></i>NaN</div>
</div>