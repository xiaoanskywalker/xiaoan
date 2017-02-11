<div id="fundetail">
    <center><h4>修改密码</h4></center>
    <form name="c" action="" method=post>
        原&nbsp;密&nbsp;码:<input type=password name="pwd0" maxlength="15" class="form-control" required="">
        新&nbsp;密&nbsp;码:<input type=password name="pwd1" maxlength="15" class="form-control" required>
        再输新密码:<input type=password name="pwd2" maxlength="15" class="form-control" required>
        <input name="c" type=submit value="修改密码" class="btn btn-success btn-lg">
    </form>
    <?php
        session_start();
        $user=@$_SESSION["user"];
        if(user==null){header("Location:../");}	
        $pwd0=@$_POST['pwd0'];
        $pwd1=@$_POST['pwd1'];
        $pwd2=@$_POST['pwd2'];
        if(empty($_POST['c'])){exit;}
        if($pwd0==null or $pwd1==null or $pwd2==null){die ("<script> alert('三个输入框中都不能为空!');window.navigate('./myhome.php?action=changepwd');</script>");}
        if($pwd1!=$pwd2){die ("<script> alert('两次输入的新密码不一致!');window.navigate('./myhome.php?action=changepwd');</script>");}
        $pwd0=md5($pwd0);
        $pwd1=md5($pwd1);
        $pwd2=md5($pwd2);
        $res =mysql_query("SELECT * FROM wtb_users WHERE (usr = '$user' or email = '$user') and pwd='$pwd0'");
        $rows=mysql_num_rows($res);
        if(!$rows){die("<script> alert('原密码错误!');window.navigate('./myhome.php?action=changepwd');</script>");}
        mysql_query("update wtb_users set pwd='$pwd1' where (usr='$user' or email = '$user')");
        unset($_SESSION["user"]);//清空名字为user的session，退出登录
        echo"<script>alert('密码修改成功!');window.navigate('./login.php')</script>";
    ?>
    请<a href="./login.php" target="RightFrame">重新登陆</a>
</div>