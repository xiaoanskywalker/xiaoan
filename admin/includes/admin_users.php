<div id="fundetail">
    <center><h4>用户管理</h4></center>
    <table class="table">
        <tr>
            <td>UID</td>
            <td>头像和用户名</td>
            <td>注册时间</td>
            <td>性别</td>
            <td>用户组</td>
            <td>操作</td>
        </tr>
        <?php
            session_start();
            if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
            $rs = mysql_query("SELECT * FROM wtb_users ORDER BY uid DESC");
            while($row = mysql_fetch_row($rs)){
	        echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td><img src='../common/images/avatar/";
                $file = "../common/images/avatar/$row[1].png";
                if(file_exists($file)){ echo $row[1];}
                else{echo "default_avatar";}
                echo ".png'  height='80' width ='80' />$row[1]";
	        $rows = mysql_fetch_row(mysql_query("SELECT * FROM wtb_userinfo WHERE uid=$row[0]"));
	        echo "</td>";
                echo "<td>$rows[3]</td>";
                echo "<td>";
                if($rows[1]==1){echo "男";}
                else {echo "女";}
                echo "</td>";
                echo "<td>";
                if($row[4]==1){echo"普通管理员";}
                elseif($row[4]==2){echo"超级管理员";}
                else{echo"普通用户";}
                echo "</td>";
	        require("./includes/admin_del_usr.php");
	        echo "</tr>";
            }
        ?>
    </table>
</div>
<?php
$mode=@$_REQUEST["mode"];
$uid=@$_REQUEST["uid"];
if($mode==null or $uid==null){exit;}
is_numeric($uid) or die("<script> alert('无效的参数!');window.navigate('./index.php?action=users');</script>");
function _del(){
    $uid=@$_REQUEST["uid"];
    $row = mysql_fetch_row(mysql_query("SELECT * FROM wtb_users WHERE uid='$uid'"));
    if($row[4]!=0){
        die("<script> alert('您不能删除平台管理员!');window.navigate('./index.php?action=users');</script>");
    }
    mysql_query("DELETE FROM wtb_users WHERE uid=$uid");
    mysql_query("DELETE FROM wtb_userinfo WHERE uid=$uid");
    die("<script> alert('用户(uid:$uid,用户名:$row[1])删除成功!');window.navigate('./index.php?action=users');</script>");
}
if($mode=="del"){
    _del();exit;
}



