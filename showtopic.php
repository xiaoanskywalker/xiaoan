<?php
session_start();
/*TopicID��������*/
$tid=@$_REQUEST["tid"];
if($tid==null){$tid=1;}
is_numeric($tid) or die("<script> alert('��Ч�Ĳ���!');window.navigate('./');</script>");
if($tid<=0){
    $tid=1;
    die("<script> alert('topicID������������!');window.navigate('./showtopic.php');</script>");
}
$tid=round($tid);
/*page�������ӷ�ҳԤ����*/
$page=@$_REQUEST["page"];
if($page==null){$page=1;}
is_numeric($page) or die("<script> alert('��Ч�Ĳ���!');window.navigate('./');</script>");
if($page<=0){
    $page=1;
    die("<script> alert('page������������!');window.navigate('./');</script>");
}
$pagestart=round(($page-1)*21);
$pageend=round($page*21+1);
?>
<html>
    <head>
        <meta charset="gb2312">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./common/css/showtopic.css" />
        <style type="text/css">
         body {background-image:url(./common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <link rel="stylesheet" href="./common/css/bootstrap.css">
        <script type="text/javascript">
        function pagego(){
        var aa = document.getElementById("pagea").value;
        window.navigate('./showtopic.php?tid=<?php echo $tid;?>&page=' + aa);
        }
        function register(){
        self.location='./user/register.php'; 
        }
        function logout(){
        self.location='./user/logout.php'; 
        }
        function login(){
        self.location='./user/login.php'; 
        }     
        </script>
        <?php
        require_once './common/config.php';
        require_once './common/conn.php';
        $rs=mysql_query("SELECT * FROM wtb_titles where tid=$tid") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('./');</script>");
        $row = mysql_fetch_row($rs);
        echo "<title>$row[2]</title>" ;
        if (mysql_num_rows($rs)<1){die("<script> alert('���Ӳ����ڣ�!');window.navigate('./');</script>");}
        ?>
         <script language="javascript"> 
         function keypress2() //�����������볤�ȴ��� 
         { 
         var text1=document.getElementById("myarea").value; 
         var len;//��¼ʣ���ַ����ĳ��� 
         if(text1.length>=10000)
         { 
         document.getElementById("myarea").value=text1.substr(0,300); 
         len=0; 
         } 
         else 
         { 
         len=10000-text1.length; 
         } 
         var show="�㻹��������"+len+"����"; 
         document.getElementById("pinglun").innerText=show; 
         } 
         </script> 
    </head>
    <body>
        <div id="main">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="./">��ҳ</a></li>
                <li class="active">
                    <?php echo"<a href='./showtopic.php?tid=$tid'>��������$row[2]</a>"?></li>
                </ol>
            </div>
            <h2> <?php echo $row[2];?></h2>
            <div id="showtopicmain" >             
                <div id="stcon">
                   <div id="user">
                      <img src='./common/images/avatar/<?php
                      $rs=mysql_query("SELECT * FROM wtb_titles WHERE tid=$tid")or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('./');</script>");
                      $row = mysql_fetch_row($rs);
                      $file = "./common/images/avatar/".$row[1].".png";
                      if(file_exists($file)){echo $row[1];}
                      else{echo "default_avatar";}
                      echo(".png' /><p>¥��&nbsp;<b>");
                      echo($row[1]."</b><br>������&nbsp;<b>".$row[3]."</b>"); 
                      /*�������������*/
                      ?>
                   </div>
                  <div id="ctn"><?php echo $row[4];?></div>
                </div>   
            </div>
            <div id="showtopicreply">
            <?php
            /*�����������*/
            $rs=mysql_query("SELECT * FROM wtb_reply WHERE tid=$tid LIMIT $pagestart,$pageend")or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('./');</script>");
            while($row = mysql_fetch_row($rs)){
                echo"<div id='showtoc'> <div id='ston'><div id='user'><img src='./common/images/avatar/";
                $file = "./common/images/avatar/".$row[2].".png";
                if(file_exists($file)){echo $row[2];}
                else{echo "default_avatar";}
                echo(".png' /><p><b>");
                echo($row[2]."</b><br>������&nbsp;<b>".$row[4]."</b>"); 
                echo "</div><div id='ctn'>$row[3]</div></div></div>";
            }?>
            </div>
            <div id="right">
                <div id="avatar">
                   <a href="#" ><img src="./common/images/avatar/<?php
                   if($_SESSION["user"]==null){echo "default_avatar";}
                   else{
                        $file = "./common/images/avatar/".$_SESSION["user"].".png";
                        if(file_exists($file)){echo $_SESSION["user"];}
                        else{echo "default_avatar";}
                   }
                   ?>.png"  height="100" width ="100" /></a> 
                </div>
                <div id="loginbtn">
                    <?php
                    if($_SESSION["user"]==null){
                        echo "��¼�����ݸ�����<p>";
                        echo"<button onclick='login()' class=lgbtn>��¼</button>
                    <button onclick='register()' class=regbtn>ע��</button>";
                    }
                    else{
                        echo ($_SESSION["user"])."<p>";
                        echo "<button onclick='logout()') class=lgbtn>�˳���¼</button>";
                    }
                    ?>
                </div>
            </div>
            <div id="page">
            <?php
            for($i=-5;$i<=5;$i++){
                $pge=$page+$i;
                if($pge>=1){
                    echo ("<a href='./?tid=$tid&page=$pge'>$pge</a>&nbsp;"); 
                } 
             }
            ?>
            <a href="./showtopic.php?tid=<?php echo $tid;?>">��ҳ</a>
            <input type = "text" id="pagea" name="pagea" placeholder="����ҳ��..."></input>
            <a href="#" onclick="pagego()">GO</a>
            </div>
            <div id="addreply">
                <b><p>�����ظ� New Reply'</b>
                <form method="POST" action="./common/addtopic.php?action=newreply&tid=<?php echo $tid;?>">
                <textarea rows="15" id="myarea" onKeyUp="keypress2()" onblur="keypress2()" name="reply" cols="150" placeholder="����������...���ܳ���10000����" maxlength="10000" style="outline: none;">
                </textarea><p><input type="submit" value="����" name="ok">
                <font color="gray">&nbsp;&nbsp;<label id="pinglun">�㻹��������10000����</label></font>
                </form>
            </div>
        <hr><footer>
        <div id="foot">&copy; <a rel="nofollow" href="http://xiaoanbbs.cn">С������</a>حV0.2.0</div>
        </footer>
    </body>
</html>