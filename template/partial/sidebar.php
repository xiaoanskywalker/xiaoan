<?php
/*sidebar*/
if ($page['sidebar']['content']) {
    require $page['sidebar']['content'];
} else {
    ?>
    <aside class="sidebar">
        <ul>
            <li><a href="./"><i class="zmdi zmdi-comments"></i>话题</a></li>
            <li><a href="./user/"><i class="zmdi zmdi-star"></i>我的</a></li>
            <li><a href="#"><i class="zmdi zmdi-view-list"></i>分类</a></li>
        </ul>
    </aside>
    <?php
}
?>