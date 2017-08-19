<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/topic-manage.php
 */
?>
<p></p>
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
<br><b>用户管理：</b>&nbsp;
    <a href="#" onclick="bantime('<?= $baseurl ?>',<?= User::getByName($topic->username)->id?>,<?= $tid ?>)">封禁</a>
    <input type="radio" name="bantime" id="1h" value="12h" />半天
    <input type="radio" name="bantime" id="1h" value="1d" checked />1天
    <input type="radio" name="bantime" id="1h" value="7d" />1周
    <input type="radio" name="bantime" id="1h" value="1m" />1月
    <?php if($user->admingp == 2){ ?>
        <input type="radio" name="bantime" id="1h" value="1y" />1年
        <input type="radio" name="bantime" id="1h" value="f" />永久
        <input type="radio" name="bantime" id="1h" value="s" />自定义：至
    <?php  } ?>
    <input type="text" name="bantimes" id="bantimes" value="<?=date("Y-m-d H:i:s",strtotime("+1 week"))?>" required />
<p></p>