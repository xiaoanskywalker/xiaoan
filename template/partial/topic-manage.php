<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/topic-manage.php
 */
?>
<b>帖子管理：</b>&nbsp;
<a href="<?= $baseurl ?>/admin/setting.php?action=topictype&tid=<?= $tid ?>&tp=0">删帖</a>
<?php
switch (Post::gettype($tid)->topictype){
    case 1:
        echo "<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=2'>置顶</a>&nbsp;<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=3'>加精</a>";
        break;
    case 2:
        echo "<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=1'>取消置顶</a>&nbsp;<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=4'>加精</a>";
        break;
    case 3:
        echo "<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=4'>置顶</a>&nbsp;<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=1'>取消加精</a>";
        break;
    case 4:
        echo "<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=3'>取消置顶</a>&nbsp;<a href='$baseurl/admin/setting.php?action=topictype&tid=$tid&tp=2'>取消加精</a>";
        break;
    default:
        return null;
}
?>
<p></p>
