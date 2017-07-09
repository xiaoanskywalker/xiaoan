<div class="discussion">
    <div class="avatar-area">
        <?php
        $avatar = User::avatar($discussion->username,$baseurl);
        $uid = User::getByName($discussion->username);
        $replynumber = Site::replynumber($discussion->id);
        ?>
        <a href="./user/home.php?uid=<?= $uid->id ?>" target="_blank"><img src="<?= $avatar ?>" class="avatar" alt="<?= $discussion->username ?>"></a>
    </div>

    <div class="profile">
        <h3 class="title">
            <a href=".<?= $discussion->url ?>"><?= $discussion->title ?></a>&nbsp;<?= Post::topictype($discussion->topictype)?>
        </h3>
        <div class="preview">
            <?= substr($discussion->content,0,80)?>
        </div>
        <div class="info">
            <a href="./user/home.php?uid=<?= $uid->id ?>" target="_blank" class="author"><?= $discussion->username ?></a>
            <span class="time"><?= $discussion->getDate() ?></span>
        </div>
    </div>
    <div class="count"><i class="zmdi zmdi-comments"></i><?= $replynumber->replynumber ?></div>
</div>