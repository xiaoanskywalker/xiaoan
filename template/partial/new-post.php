<div class="new-post">
    <form method="post" action="">
        <div class="post-title">
            <SELECT name="prefix" onchange="document.getElementById('title').value=this.options[this.selectedIndex].value">
                <?php
                //循环输出前缀
                foreach($per as $pers){
                    echo "<option value ='$pers'>$pers</option>";
                }
                ?>
            </SELECT>
            <input type="text" id="title" name="title" placeholder="话题标题" value="<?=$arr[count($arr)-1] ?>" maxlength="30" required>
        </div>
        <div class="post-content">
            <textarea name="topic" class="input-area" placeholder="写点什么..." required></textarea>
        </div>
        <input name="sendtopic" type = "submit" class="button send-button" value = "发送">
    </form>
</div>