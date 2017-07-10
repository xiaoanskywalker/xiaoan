<b>帖子管理：</b>&nbsp;
<a href="<?= $baseurl ?>/admin/toptyp.php?type=0">删帖</a>
<?php
switch (Post::gettype($tid)->topictype){
    case 1:
        echo "<a href='$baseurl/admin/toptyp.php?type=2'>置顶</a>&nbsp;<a href='$baseurl/admin/toptyp.php?type=3'>加精</a>";
        break;
    case 2:
        echo "<a href='$baseurl/admin/toptyp.php?type=1'>取消置顶</a>&nbsp;<a href='$baseurl/admin/toptyp.php?type=4'>加精</a>";
        break;
    case 3:
        echo "<a href='$baseurl/admin/toptyp.php?type=4'>置顶</a>&nbsp;<a href='$baseurl/admin/toptyp.php?type=1'>取消加精</a>";
        break;
    case 4:
        echo "<a href='$baseurl/admin/toptyp.php?type=3'>取消置顶</a>&nbsp;<a href='$baseurl/admin/toptyp.php?type=2'>取消加精</a>";
        break;
    default:
        return null;
}
?>
<p></p>
