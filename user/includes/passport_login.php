<title>小安社区用户登录</title>
    <div id="main">
        <div id="login">
            <div style="padding: 50px 100px 19px 50px;">
            	<center>
                    <form class="form-inline" name="login" role="form" action="" method=post>
            		    <table  border = "0" cellpadding = "4">
                            <tr>
                                <td  align = "center">用户名</td>
                                <td><input type = "text" class="form-control" name="username" placeholder="可以是用户名或邮箱" required></td>
                            </tr>
                            <tr>
                                <td  align = "center">密码</td>
                                <td><input type = "password" class="form-control" name="password" placeholder="请输入密码" required></td>
                            </tr>
                            <tr>
                                <td colspan = "2" align = "center">
                                    <input name="log" type = "submit" class="btn btn-primary" value = "登录">
                                    <a class="btn btn-warning" href="#">忘记密码？</a>
                                </td>
                            </tr>
                        </table>
            	    </form>
                </center>
            </div>
        </div>
<footer>
    <div>
        &copy; <a rel="nofollow" href="http://xiaoanbbs.cn">小安社区</a>丨V0.2.0
    </div>
</footer>
<?php
session_start();
if(empty($_POST['log'])){exit;}
if(@$_SESSION["user"]!=null){ header("Location:../");}

        $username=@$_POST['username'];
        $passowrd=@$_POST['password'];
        if($username==null or $passowrd==null){
            die ("<script> alert('请填写用户名和密码!');window.navigate('./login.php');</script>");
        }
        $passowrd=md5(@$_POST['password']);
        if(preg_match("/[\'.,:;*?~`!#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$username)){
            die ("<script> alert('用户名或密码中有非法字符！');window.navigate('./login.php'); </script>");
        }
        $res = mysqli_query($con,"SELECT * FROM wtb_users WHERE (usr = '$username' or email = '$username') and pwd='$passowrd'");
        $rows=mysqli_num_rows($res);
        if($rows){
            $rows=mysqli_fetch_row($res);
            $_SESSION["user"] = $rows[1];
            die ("<script>alert('亲爱的".$rows[1]."，欢迎回来！');window.navigate('../');</script>");
        }
        else{
            die ("<script> alert('用户名或密码错误！'); window.navigate('./passport.php?action=login');</script>");
        }

        ?>