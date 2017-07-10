<div class="discussion-list">
    <ul class="discussions">

        <?php
        //TODO 显示回复的楼层数
        if($user->admingp != 0 ){
            require "topic-manage.php";
        }
        require "showreply-topic.php";
        foreach ($reply as $replys) {
            ?>
            <li>
                <?php require 'showreply-preview.php'; ?>
            </li>
            <?php
        }
        ?>
</ul>
</div>