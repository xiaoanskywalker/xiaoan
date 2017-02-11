<?php
/*UserID参数处理*/
$uid=@$_REQUEST["uid"];
if($uid==null){die("<script> alert('UserID参数不能为空!');</script>");}
is_numeric($uid) or die("<script> alert('无效的参数!');</script>");
if($uid<=0){die("<script> alert('UserID参数非正整数!');</script>");}
$uid=round($uid);
require_once '../common/config.php';
require_once '../common/conn.php';
$rs=mysql_query("SELECT * FROM wtb_users WHERE uid=$uid");
if(mysql_num_rows($rs)<1){die("<script> alert('该用户不存在!uid=$uid');</script>");}
$row = mysql_fetch_row($rs);
$username=$row[1];
$usrgroup=$row[4];
$rs=mysql_query("SELECT * FROM wtb_userinfo WHERE uid=$uid");
if(mysql_num_rows($rs)<1){die("<script> alert('程序运行时出现异常!uid=$uid');</script>");}
$row = mysql_fetch_row($rs);
$sex=$row[1];
$birthday=$row[2];
$regtime=$row[3];
$email=$row[4];
?>
<html>
    <head>
        <title>个人中心-<?php echo $username;?></title>
        <style>
        a img{border:none}
        .testdiv *{vertical-align:middle;}
        body {background-image:url(../common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <link rel="stylesheet" type="text/css" href="../common/css/home.css" />
        <link rel="stylesheet" href="../common/css/bootstrap.css">
        <script src="../common/js/jquery.min.js"></script>
        <script src="../common/js/bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html;charset=gb2312">
    </head>
    <body>
        <div id="myhome">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">首页</a></li>
                <li class="active"><a href="./myhome.php">个人中心-<?php echo $username;?></a></li>
                </ol>
            </div>
            <div class="testdiv" >
                <img src="../common/images/avatar/<?php
                 $file = "../common/images/avatar/$username.png";
                if(file_exists($file))
                  { echo $username;}
                else
                  {echo "default_avatar";}
                ?>.png"  height="80" width ="80" />
                <span><font size='6' color="purple">个人中心-<?php echo $username;?></font></span>
            </div>
            <hr style=" height:4px;border:none;border-top:2px dotted green;" />
            <div id="fundetail">
                <table class="table">
                    <tr>
                        <td>
                            <b>用户名:<p></b><?php echo $username;?>
                        </td>
                        <td>
                            <b>uid:<p></b><?php echo $uid;?> 
                        </td>
                        <td>
                            <b>性别：<p></b><?php if($sex==1){echo"男";}else{echo"女";}?>
                        </td>
                        <td>
                            <b>生日:<p></b><?php echo $birthday; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>注册时间：<p></b><?php echo $regtime;?>
                        </td>
                        <td>
                            <b>电子邮箱：<p></b><?php echo $email;?>
                        </td>
                    </tr>
                </table>
            </div>      
        </div>
    </body>
</html>