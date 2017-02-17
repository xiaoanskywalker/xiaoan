<div class="discussion-list">
    <ul class="discussions">

        <?php
        foreach ($discussions as $discussion) {
            ?>
            <li>
                <?php require 'post-preview.php'; ?>
            </li>
            <?php
        }
        ?>
    </ul>
</div>