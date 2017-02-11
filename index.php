<?php
if((file_exists("./common/config.php"))==false){
    header("location:./install/");
}
session_start();
/*帖子分页预处理1*/
$page=@$_REQUEST["page"];
if($page==null){$page=1;}
is_numeric($page) or die("<script> alert('无效的参数!');window.navigate('./');</script>");
if($page<=0){
    $page=1;
    die("<script> alert('page参数非正整数!');window.navigate('./');</script>");
}
$pagestart=round(($page-1)*40);
$pageend=round($page*40+1);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./common/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./common/css/style.css" />
        <style type="text/css">
         body {background-image:url(./common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <?php
        require_once './common/config.php';
        require_once './common/conn.php';
        $rs=mysql_query("SELECT * FROM wtb_general_settings where gid=1") or die("连接到数据库时出现错误。");
        $row = mysql_fetch_row($rs);
        echo "<title>$row[1]</title><meta name='keywords' content='$row[2]' /><meta name='description' content='$row[3]' />" ;
        ?>
         <script language="javascript"> 
         function keypress1() //发帖标题输入长度处理 
         { 
         var text1=document.getElementById("mytext1").value; 
         var len=50-text1.length; 
         var show="你还可以输入"+len+"个字"; 
         document.getElementById("name").innerText=show; 
         } 
         function keypress2() //发帖内容输入长度处理 
         { 
         var text1=document.getElementById("myarea").value; 
         var len;//记录剩余字符串的长度 
         if(text1.length>=10000)//textarea控件不能用maxlength属性，就通过这样显示输入字符数了 
         { 
         document.getElementById("myarea").value=text1.substr(0,300); 
         len=0; 
         } 
         else 
         { 
         len=10000-text1.length; 
         } 
         var show="你还可以输入"+len+"个字"; 
         document.getElementById("pinglun").innerText=show; 
         } 
         </script> 
    </head>
    <body>
    <div id="index">
         <!--
        <div id="logo">
            <div style="width:65%; float:left;">
                <p><img src="images/logo.png" />
            </div>
           -->
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
                        echo "登录后内容更精彩<p>";
                        echo"<button onclick='login()' class=lgbtn>登录</button>
                    <button onclick='register()' class=regbtn>注册</button>";
                    }
                    else{
                        echo ($_SESSION["user"])."<p>";
                        echo "<button onclick='logout()') class=lgbtn>退出登录</button>";
                    }
                    ?>
                </div>
            </div>
        <div id="main">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="./">首页</a></li>
                </ol>
            </div>
            <div id="show">
                <?php
                 $rs = mysql_query("SELECT * FROM wtb_titles ORDER BY tid DESC limit $pagestart,$pageend");
                 while($row = mysql_fetch_row($rs)) {
                 echo "<div id='showtopic'>";
                     /*帖子标题*/
                     echo "<div id='showtopictitle'>";
                     echo "<a href='showtopic.php?tid=$row[0]' target='_blank'>";
                     echo(substr($row[2],0,46)."</a>");
                     echo "</div>";
                     /*帖子内容*/
                     echo "<div id=’showtopicinclude'>";
                     echo (substr($row[4],0,100)."...");
                     echo "</div>";
                     /*发帖作者及发布时间*/
                     echo "<div id=’showtopicuser'>";
                     echo($row[1]."发表于".$row[3]);
                     echo "</div></div><p></p>";
                 }
                 /*显示页码*/
                 if (mysql_num_rows($rs)<1){echo"记录集为空";}
                 echo"<div id='page'>";       
                 for($i=-5;$i<=5;$i++){
                    $pge=$page+$i;
                    if($pge>=1){
                        echo ("<a href='./?page=$pge'>$pge</a>&nbsp;"); 
                    } 
                 }
                ?>
                <a href="./">首页</a>
                <input type = "text" id="pagea" name="pagea" placeholder="输入页码..."></input>
                <a href="#" onclick="pagego()">GO</a>
                <script type="text/javascript">
                    function pagego(){
                    var aa = document.getElementById("pagea").value;
                    window.navigate('./?page=' + aa);
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
                </script><p>
                <div id="addtopic">      
                        <b>发表主题 New Topic</b>
                        <form method="POST" action="./common/addtopic.php?action=newtopic">
                        <input type=text name="title" id="mytext1" onKeyUp="keypress1()" placeholder="请输入标题...不能超过50个字" maxlength="50" size="80" id="addtopictitle">
                        <font color="gray"><label id="name">你还可以输入50个字</label></font> <p>
                        <textarea rows="15" id="myarea" onKeyUp="keypress2()" onblur="keypress2()" name="topic" cols="150" placeholder="请输入内容...不能超过10000个字" maxlength="10000" style="outline: none;">
                        </textarea><p><input type="submit" value="发帖" name="ok">
                        <font color="gray">&nbsp;&nbsp;<label id="pinglun">你还可以输入10000个字</label></font>
                        </form>
                </div>
            </div>
        </div>
    </div>
         </div>    
    <hr><footer>
    <div id="foot">&copy; <a rel="nofollow" href="http://xiaoanbbs.cn">小安社区</a>丨V0.2.0</div>
    </footer>
</body>
</html><p>