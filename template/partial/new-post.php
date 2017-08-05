<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /template/partial/new-post.php
 */
require "add-picture.php";
?>
<div class="new-post">
    <form method="post" action="">
        <div class="post-title">
            <?php
            if (Post::show_prefix() != null){?>
                <SELECT name="prefix" onchange="document.getElementById('title').value=this.options[this.selectedIndex].value">
                    <?php
                    //循环输出前缀
                    foreach($per as $pers){
                        echo "<option value ='$pers'>$pers</option>";
                    }
                    ?>
                </SELECT>
            <?php } ?>
            <span onClick="d_x();" style="cursor:hand"><a href="#">添加图片 </a> </span>
            <input type="text" id="title" name="title" placeholder="话题标题" value="<?= $per[0] ?>" maxlength="30" required>
        </div>
        <div class="post-content">
            <textarea name="topic" id ="topic" class="input-area" placeholder="写点什么..." required></textarea>
        </div>
        <input name="sendtopic" type = "submit" class="button send-button" value = "发送">
    </form>
</div>


