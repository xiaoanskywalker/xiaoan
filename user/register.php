<?php 
session_start();
date_default_timezone_set('PRC');
if(!empty($_POST['reg'])){ _register();}
if(@$_SESSION["user"]!=null){ header("Location:../");}	
function _register(){
    require_once("../common/config.php");
    require_once("../common/conn.php");
    $username=@$_POST['username'];
    $password=@$_POST['password'];
    $email=@$_POST['email'];
    $code=@md5($_POST['code']);
    $password2=@$_POST['password2'];
    if($username==null or $password==null or $email==null or $password2==null){
        die ("<script> alert('请填写相关信息!');window.navigate('./register.php');</script>"); 
    }
    if($code!= $_SESSION["verification"]){
        die ("<script> alert('验证码错误!');window.navigate('./register.php');</script>");
    }
    if($password!=$password2){
        die ("<script> alert('两次输入的密码不一致，请重新输入!');window.navigate('./register.php');</script>");
    }
    if (strstr($email,"@")==false){
        die ("<script> alert('电子邮箱格式错误!');window.navigate('./register.php');</script>"); 
    }
    $res = mysqli_query($con,"SELECT * FROM wtb_users WHERE usr = '$username' ") ;
    $rows=mysqli_num_rows($res);
    if($rows){
        die ("<script> alert('该用户名已被注册!');window.navigate('./register.php');</script>");        
    }
    $res = mysqli_query($con,"SELECT * FROM wtb_users WHERE email = '$email'") ;
    $rows=mysqli_num_rows($res);
    if($rows){
        die ("<script> alert('该电子邮箱已被注册!');window.navigate('./register.php');</script>");        
    }
    $password=md5($password);
    mysqli_query($con,"insert into wtb_users  values (null,'".$username."' ,'".$password."','".$email."',0)");
    $rs = mysqli_query($con,"SELECT * FROM wtb_users where usr='".$username."'");    $row = mysqli_fetch_row($rs) ;
    $uid=$row[0];
    $time = date('Y-m-d h:m:s');
    mysqli_query($con,"insert into wtb_userinfo  values ('".$uid."',1,'2016-1-1','".$time."','".$email."')");
    die ("<script> alert('亲爱的 ".$username."，注册成功!');window.navigate('./login.php');</script>");
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
        <title>小安社区用户注册</title>
        <script type="text/javascript" >
        function changing(){document.getElementById('checkpic').src="../common/checkcode.php?"+Math.random();} 
        </script>
    </head>
    <body>
        <div id="main">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">首页</a></li>
                <li class="active"><a href="./register.php">用户注册</a></li>
                </ol>
            </div>
            <div id="login">
                    <ul class="nav nav-pills nav-justified">
                      <li class="active"><a href="./login.php">登录</a></li>
                      <li><a href="#">注册</a></li>
                    </ul>
            <div style="padding: 50px 100px 19px 50px;">
            	<center><form class="form-inline" name="login" role="form" action="" method=post>
            		<table  border = "0" cellpadding = "4">
                  <tr><table>
                         <td  align = "center">用户名</td>
                         <td><input type = "text" class="form-control" name="username" placeholder="不能超过8位字符" required></td>
                  </tr>
                  <tr>
                      <td  align = "center">电子邮箱</td>
                         <td><input type = "text" class="form-control" name="email" placeholder="请输入正确的电子邮箱地址" required></td>
                 </tr>                  
                  <tr>
                         <td  align = "center">密码</td>
                         <td><input type = "password" class="form-control" name="password" maxlength="15" placeholder="不能超过15位字符" required></td>
                 </tr>
                  <tr>
                         <td  align = "center">再输一次密码</td>
                         <td><input type = "password" class="form-control" name="password2" maxlength="15" placeholder="不能超过15位字符" required></td>
                 </tr>       
                  <tr>
                         <td  align = "center">验证码</td>
                         <td><input type = "text" class="form-control" name="code" maxlength="4" placeholder="点击图片可换一张" required>
                         <img id="checkpic" onclick="changing();" src='../common/checkcode.php' /></td>
                 </tr>                 
                 <tr>
             <td colspan = "2" align = "center">
                         <input name="reg" type = "submit" class="btn btn-primary" value = "注册">
                         </tr></table>            
            	</form></center>
            </div>
            </div>
    </body>
    <footer>
    <div>&copy; <a rel="nofollow" href="http://xiaoanbbs.cn">小安社区</a>丨V0.2.0</div>
    </footer>
</html>