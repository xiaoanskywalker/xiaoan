<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        foreach ($pagination as $temp) {
            ?>
            <li><a href="<?= $temp['url'] ?>"><?= $temp['id'] ?></a></li>
            <?php
        }
        ?>
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>