<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/register-box.php
 */
?><div class="register-box">
    <script type="text/javascript" >
        function changing(){
            document.getElementById('checkpic').src="../common/checkcode.php?"+Math.random();
        }
    </script>

    <form class="form-inline" name="login" role="form" action="" method=post>

        <input type="text" class="form-control" placeholder="用户名" name="username" required>
        <input type="password" class="form-control" placeholder="密码" name="password" required>
        <input type="password" class="form-control" placeholder="确认密码" name="password2" required>
        <input type="text" class="form-control" placeholder="电子邮箱" name="email" required>
        <?php if(Site::ifopen()->checkcode == 1){?>
        <input type="text" class="form-control" placeholder="验证码,请输入计算结果,点击图片可换一张" name="checkcode" required>
        <?php } ?>

        <div class="button-line">
            <input name="log" type="submit" class="btn btn-success" value="注册">
            <?php if(Site::ifopen()->checkcode == 1){?>
            <img id="checkpic" onclick="changing();" src='../common/checkcode.php' />
            <?php } ?>
        </div>


    </form>

</div>