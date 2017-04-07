<div class="discussion-list">
    <ul class="discussions">

        <?php
        require "showreply-topic.php";
        $replies = Post::getreply($tid,$pages);
        ?>
</ul>
</div>