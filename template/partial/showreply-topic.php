<div class="showreply-topic">
    <div class="showreply-title">
        <?= $topic->title?>
    </div>
    <div class="showreply-content">
        <?= $topic->content?>
    </div>
    <div class="showreply-author">
        <a href="#" class="author"><?= $topic->username ?></a>
        发表于
        <span class="time"><?= $topic->getDate() ?></span>
    </div>

</div>