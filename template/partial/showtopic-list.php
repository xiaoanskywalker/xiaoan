<div class="discussion-list">
    <ul class="discussions">

        <?php
        require "showreply-topic.php";
        //TODO 显示回复的楼层数
        //TODO 解决发帖成功后出现warning错误
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