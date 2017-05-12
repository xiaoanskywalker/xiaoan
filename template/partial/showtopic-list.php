<div class="discussion-list">
    <ul class="discussions">

        <?php
        require "showreply-topic.php";
        $replies = Post::getreply($tid,$pages);
        //TODO 显示回复的楼层数
        ?>
</ul>
</div>