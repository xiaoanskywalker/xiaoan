<?php if ($_SESSION["user"]==null){exit;}?>
<div class="new-post">
    <form method="post" action="">
        <div class="post-title">
            选择一个发帖前缀：
            <select name="prefix">
            <?php
            $per=User::show_prefix();
            $arr = explode(" ", " ".$per);
            $index =count($arr);
            while($index>0){
                echo "<option value ='$arr[$index]'>$arr[$index]</option>";
                $index=$index-1;
            }
            ?>
            </select><p></p>
            <input type="text" name="title" placeholder="话题标题" required>
        </div>
        <div class="post-content">
            <textarea name="topic" class="input-area" placeholder="写点什么..." required></textarea>
        </div>
        <input name="send" type = "submit" class="button send-button" value = "发送">
    </form>
</div>