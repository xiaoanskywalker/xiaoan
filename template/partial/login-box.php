<div class="login-box">
    <form class="form-inline" name="login" role="form" action="" method=post>

        <input type="text" class="form-control" placeholder="用户名或邮箱账号" name="username" required>
        <input type="password" class="form-control" placeholder="密码" name="password" required>
        <input type="text" class="form-control" placeholder="验证码，点击图片可换一张" name="checkcode" required>
        <div class="button-line">
            <input name="log" type = "submit" class="btn btn-success" value = "登录">
            <a class="btn btn-warning">忘记密码?</a>
            <img id="checkpic" onclick="changing();" src='../common/checkcode.php' />
        </div>


    </form>

</div>