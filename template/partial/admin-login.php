<center>
    <h4>管理登录</h4>
</center>
<div class="login-box">
    <center>
        <form class="form-inline" name="login" role="form" action="" method=post>
            管理员用户名：<?= $user->name ?><p>
                <input type="password" class="form-control" placeholder="密码" name="password" required><p>
                <input type="text" class="form-control" placeholder="验证码，点击图片可换一张" name="checkcode" required>
                <img id="checkpic" onclick="changing();" src='../common/checkcode.php' />
            <div class="button-line">
                <input name="login" type = "submit" class="btn btn-success" value = "登录">
            </div>
        </form>
    </center>
</div>