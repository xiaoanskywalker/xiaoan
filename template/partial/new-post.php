<div class="new-post">
    <form method="post" action="">
        <div class="post-title">
            <SELECT name="prefix" onchange="document.getElementById('title').value=this.options[this.selectedIndex].value">
                <?php
                /*发帖前缀功能*/
                $per=User::show_prefix();//获取全部前缀
                $arr = explode(" "," ".$per);//将每个前缀导入数组，以空格为分界
                $index =count($arr)-1;//获取前缀个数
                //循环输出前缀
                while($index>0){
                    echo "<option value ='$arr[$index]'>$arr[$index]</option>";
                    $index=$index-1;
                }
                ?>
            </SELECT>
            <input type="text" id="title" name="title" placeholder="话题标题" value="<?=$arr[count($arr)-1] ?>" required>
        </div>
        <div class="post-content">
            <textarea name="topic" class="input-area" placeholder="写点什么..." required></textarea>
        </div>
        <input name="sendtopic" type = "submit" class="button send-button" value = "发送">
    </form>
</div>