<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/blockuser-page.php
 */
?>
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
