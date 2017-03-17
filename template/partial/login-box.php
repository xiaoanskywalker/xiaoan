<div class="login-box">
    <script type="text/javascript" >
        function changing(){
            document.getElementById('checkpic').src="../common/checkcode.php?"+Math.random();
        }
    </script>
    <form class="form-inline" name="login" role="form" action="" method=post>

        <input type="text" class="form-control" placeholder="Username" name="username" required>

        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <input type="text" class="form-control" placeholder="Checkcode" name="checkcode" required>
        <div class="button-line">
            <input name="log" type = "submit" class="btn btn-success" value = "登录">
            <a class="btn btn-warning">忘记密码?</a>
            <img id="checkpic" onclick="changing();" src='../common/checkcode.php' />
        </div>


    </form>

</div>