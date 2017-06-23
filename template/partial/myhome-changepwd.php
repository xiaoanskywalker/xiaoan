<center>
    <h4>修改密码</h4>
</center>
<div class="content">
    <div class="login-box">
        <form class="form-inline" name="login" role="form" action="" method=post>
            <input type="password" class="form-control" placeholder="原密码" name="password0" required><br>
            <input type="password" class="form-control" placeholder="新密码" name="password1" required><br>
            <input type="password" class="form-control" placeholder="确认新密码" name="password2" required><br>
            <input type="text" class="form-control" placeholder="验证码，点击图片可换一张" name="checkcode" required>
            <div class="button-line">
                <input name="changepwd" type = "submit" class="btn btn-success" value = "修改密码">
                <img id="checkpic" onclick="changing();" src='../common/checkcode.php' />
            </div>
        </form>
    </div>
</div>
