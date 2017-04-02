<div class="discussion-list">
    <ul class="discussions">

        <?php
        foreach ($top as $replys) {
            ?>
            <li>
                <?php require 'showreply-preview.php'; ?>
            </li>
            <?php
        }
        ?>
</ul>
</div>