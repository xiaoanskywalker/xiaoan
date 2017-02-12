<?php 
session_start();
if(!empty($_POST['log'])){ _login();}
if(@$_SESSION["user"]!=null){ header("Location:../");}	
function _login(){
    require_once("../common/config.php");
    require_once("../common/conn.php");
    $username=@$_POST['username'];
    $passowrd=@$_POST['password'];
    if($username==null or $passowrd==null){
        echo "<script> alert('请填写用户名和密码!');window.navigate('./login.php');</script>"; 
    }
    $passowrd=md5(@$_POST['password']);
    if(preg_match("/[\'.,:;*?~`!#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$username)){ 
        echo "<script> alert('用户名或密码中有非法字符！');window.navigate('./login.php'); </script>";
    }
    $res = mysqli_query($con,"SELECT * FROM wtb_users WHERE (usr = '$username' or email = '$username') and pwd='$passowrd'");
    $rows=mysqli_num_rows($res);
    if($rows){
        $rows=mysqli_fetch_row($res);
        $_SESSION["user"] = $rows[1];
        echo "<script>alert('亲爱的".$rows[1]."，欢迎回来！');window.navigate('../');</script>";
    }
    else{
         echo "<script> alert('用户名或密码错误！'); window.navigate('./login.php');</script>";
         
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../common/css/login.css" />
        <link rel="stylesheet" href="../common/css/bootstrap.css">
        <style type="text/css">
         body {background-image:url(../common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <title>小安社区用户登录</title>
    </head>
    <body>
        <div id="main">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">首页</a></li>
                <li class="active"><a href="./login.php">用户登录</a></li>
                </ol>
            </div>
            <div id="login">
                    <ul class="nav nav-pills nav-justified">
                      <li><a href="#">登录</a></li>
                      <li class="active"><a href="./register.php">注册</a></li>
                    </ul>
            <div style="padding: 50px 100px 19px 50px;">
            	<center><form class="form-inline" name="login" role="form" action="" method=post>
            		<table  border = "0" cellpadding = "4">
                  <tr><table>
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
                         <a class="btn btn-warning" href="#">忘记密码？</a></td>
                         </tr></table>            
            	</form></center>
            </div>
            </div>
    </body>
    <footer>
    <div>&copy; <a rel="nofollow" href="http://xiaoanbbs.cn">小安社区</a>丨V0.2.0</div>
    </footer>
</html>
