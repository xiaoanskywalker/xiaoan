<?php
session_start();
$user=$_SESSION["user"];
if($user==null){header("Location:../");}
if(@$_SESSION["admin"]!=null){header("Location:./");}
?>
<div id="login">
    <div style="padding: 50px 100px 19px 50px;">
        <center><form class="form-inline" name="login" role="form" action="" method=post>
            ������¼��Ϊ��ȷ����ϵͳ�İ�ȫ�����ٴ������������롣��ȷ������ƽ̨����Ա��
            <table  border = "0" cellpadding = "4">
                <tr>
                    <td  align = "center">�û���</td>
                    <td><input type = "text" class="form-control" name="username"value="<?php echo $user;?>" disabled= "true " required></td>
                </tr>
                <tr>
                    <td  align = "center">����</td>
                    <td><input type = "password" class="form-control" name="password" placeholder="����������" required></td>
                </tr>
                <tr>
                    <td colspan = "2" align = "center">
                        <input name="log" type = "submit" class="btn btn-primary" value = "��¼">
                    </td>
                </tr>
            </table>            
        </form></center>
    </div>
</div>
<?php 
if(empty($_POST['log'])){exit;}
$passowrd=@$_POST['password'];
if ($passowrd==null){die ("<script> alert('����������!');window.navigate('./');</script>");}
$passowrd=md5($passowrd);
$rows=mysql_num_rows(mysql_query("SELECT * FROM wtb_users WHERE usr = '$user' AND pwd='$passowrd' AND (admingp=1 OR admingp=2)"));
if($rows){
    $_SESSION["admin"] = $user;
    header("Location:./");
    exit;
}
else{
    die ("<script> alert('����Ա�������!');window.navigate('./');</script>");
}
?>