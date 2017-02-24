<?php if ($_SESSION["user"]==null){exit;}?>
<div class="new-post">
    <form method="post" action="">
        <div class="post-title">
            <select>
            <?php
            $per=User::showprefix();
            $arr = explode(" ", " ".$per);
            $index =count($arr);
            while($index>0){
                echo "<option value ='$arr[$index]'>$arr[$index]</option>";
                $index=$index-1;
            }
            ?>
            </select>
            <input type="text" name="title" placeholder="话题标题">
        </div>
        <div class="post-content">
            <textarea name="topic" class="input-area" placeholder="写点什么..."></textarea>
        </div>
        <button class="button send-button">Send</button>
    </form>
</div>