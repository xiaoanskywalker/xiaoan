<?php header("Content-type:text/html;charset=UTF-8");?>
<?php include("../common/install_header.php"); ?>
<h3>第四步-<span class="label label-info">安装数据库</span></h3>
安装程序正在执行安装数据库操作，请稍安勿躁^_^。<br>
<p>
<?php 
$stime=microtime(true); 
if(file_exists("../common/config.php"))
{die ("请删除./common/config.php 后才能安装！<a href='index.php' class='btn btn-primary'>返回</a>");}
 $db_name= @$_POST['db_name'];//数据库名
 $db_host= @$_POST['db_host'];//主机地址，默认为localhost
 $db_usr= @$_POST['db_usr'];//数据库用户名
 $db_pwd= @$_POST['db_pwd'];//数据库密码
 $admin_usr= @$_POST['admin_usr'];
 $admin_email= @$_POST['admin_email'];
 $admin_pwd= @$_POST['admin_pwd'];
 if($db_name==null){die("<b><font color='red'>数据库名为空，请重新填写。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>");}
 /*开始连接数据库 行24-26*/
mysql_connect( $db_host,$db_usr ,$db_pwd) or die("<b><font color='red'>连接数据库时发生错误，请检查数据库名、数据库主机名、数据库用户名、数据库密码填写是否正确并重新填写。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>");
mysql_select_db( $db_name); //选择数据库
MySQL_query("SET NAMES 'utf8'");//数据库编码
if($admin_usr==null){die("<b><font color='red'>用户名为空，请重新填写。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>");}
if($admin_email==null){die("<b><font color='red'>邮箱为空，请重新填写。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>");}
if($admin_pwd==null){die("<b><font color='red'>账号密码为空，请重新填写。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>");}
?>   
<fieldset id="tb"> 
<legend>安装进度</legend>
<?php
echo "正在导入安装程序所需的必备数据表...<br>";
$lines=file("install.sql");
foreach($lines as $line){
  $line=trim($line);
  if($line!=""){
    if(!($line{0}=="#" || $line{0}.$line{1}=="--")){  
    mysql_query($line) or die("<b><font color='red'>执行数据库语句$line 时发生错误。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>"); 
    echo "<b><font color='green'>成功</font></b>执行SQL语句".$line."<br>";
    }
  }
}
echo "正在导入站点创始人信息...<br>";
$admin_pwd=md5($admin_pwd);
$sql="INSERT INTO `wtb_users` (`uid`, `usr`, `pwd`, `email`, `admingp`) VALUES(1, '$admin_usr', '$admin_pwd', '$admin_email',2)";
mysql_query($sql) or die("<b><font color='red'>执行数据库语句$sql 时发生错误。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>"); 
echo "<b><font color='green'>成功</font></b>执行SQL语句".$sql."<br>，并导入站点信息";
$time = date('Y-m-d h:m:s');
$sql="INSERT INTO `wtb_userinfo` VALUES(1,1, '0000-00-00', '$time','$admin_email')";
mysql_query($sql) or die("<b><font color='red'>执行数据库语句$sql 时发生错误。</font></b><p>安装程序停止运行。<a href='./step-3.php'>返回</a>"); 
echo "<b><font color='green'>成功</font></b>执行SQL语句".$sql."<br>，并导入站点信息";
$myfile = fopen("../common/config.php", "w") or die("Unable to open file!");
$txt = "<?php
error_reporting (E_ALL &~E_NOTICE &~E_DEPRECATED);
/*以下是数据库连接代码，请勿随意更改！*/ 
define('mysql_servername','$db_host'); //主机地址，默认为localhost
define('mysql_username','$db_usr'); //数据库用户名
define('mysql_password','$db_pwd');//数据库密码
define('mysql_database','$db_name'); //数据库名
?>
";
fwrite($myfile, $txt);
fclose($myfile);
$etime=microtime(true);//获取程序执行结束的时间
$total=$etime-$stime;   //计算差值
echo "<p>安装完成。安装过程共耗时$total 秒";
?>
</fieldset>
<span class="label label-danger">恭喜，安装完成！</span>
<div class="well" align="center">您可以<a href="../" class="btn btn-primary">查看站点</a>亦或者<a href="../user/login.php" class="btn btn-primary">登陆</a></div>
</body>
</html>