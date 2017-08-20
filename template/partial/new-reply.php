<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/new-reply.php
 */
require "add-picture.php";
?>
<span onClick="d_x();" style="cursor:hand"><a href="#">添加图片 </a> </span>
<div class="new-post">
    <form method="post" action="">
        <div class="post-content">
            <textarea name="reply" id ="topic" class="input-area" placeholder="写点什么...支持HTML" required></textarea>
        </div>
        <input name="sendreply" type = "submit" class="button send-button" value = "发送">
    </form>
</div>