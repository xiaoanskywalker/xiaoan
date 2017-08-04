<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/new-post.php
 */
?><div id="massage_box">
    <div class="massage">
        <div class="headerrr" onmousedown='MDown(massage_box)'>
            <div style="display:inline; width:400px; position:absolute">添加图片 </div>
            <span onClick="d_y();" style="float:right; display:inline; cursor:hand">× </span>
        </div>

        <ul style="margin-right:25">
            图片URL：<input type = "text" id="picurl" class="form-control" value="http://"  required>
            <p></p><button class = "btn btn-success" onclick="addpic()">确定</button>
        </ul>

    </div>
</div>

<div id="mask" onClick="d_y();"> </div>


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
            <?php } ?><span onClick="d_x();" style="cursor:hand"><a href="#">添加图片 </a> </span>
            <input type="text" id="title" name="title" placeholder="话题标题" value="<?= $per[0] ?>" maxlength="30" required>
        </div>
        <div class="post-content">
            <textarea name="topic" id ="topic" class="input-area" placeholder="写点什么..." required></textarea>
        </div>
        <input name="sendtopic" type = "submit" class="button send-button" value = "发送">
    </form>
</div>


