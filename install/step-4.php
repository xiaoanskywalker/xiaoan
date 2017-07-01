<?php
/*开始计时*/
$stime = microtime(true);
/*引入Model类*/
require_once '../model/User.php';
include("header.php");
?>
<h3>
    <span class="label label-info">4/5</span>-安装数据库
</h3><p>
<?php
/*定义数组*/
$install = array();
/*把相关信息保存在数组里*/
$install['go_back'] = "<a href='./step-3.php'>返回</a>";
$install['db_name'] = @$_POST['db_name'];//数据库名
$install['db_host'] = @$_POST['db_host'];//主机地址
$install['db_user'] = @$_POST['db_usr'];//数据库用户名
$install['db_pawd'] = @$_POST['db_pwd'];//数据库密码
$install['admin_user'] = @$_POST['admin_usr'];//管理员用户名
$install['admin_pawd'] = @$_POST['admin_pwd'];//管理员密码
$install['admin_pwd2'] = @$_POST['admin_pwd2'];//管理员密码确认
$install['admin_mail']  = @$_POST['admin_email'];//管理员邮箱
$install['site_name']  = @$_POST['site_name'];//管理员邮箱
/*参数预处理*/
if(!$install['db_name'] || !$install['db_host'] || !$install['db_user']){
    die("<b><font color='red'>请填写数据库信息。</font></b>".$install['go_back']);
}
if(!$install['admin_user'] || !$install['admin_pawd'] || !$install['admin_pwd2'] || !$install['admin_mail']){
    die("<b><font color='red'>请填写管理员信息。</font></b>".$install['go_back']);
}
if(!$install['site_name']){
    $install['site_name'] = "小安社区";
}
if($install['admin_pawd'] != $install['admin_pwd2']){
    die("<b><font color='red'>管理员密码和确认密码不一致。</font></b>".$install['go_back']);
}
if(strlen($install['admin_pawd'])<6){
    die("<b><font color='red'>管理员密码应大于等于6位。</font></b>".$install['go_back']);
}
/*连接数据库*/
$con = new mysqli($install['db_host'],$install['db_user'],$install['db_pawd'],$install['db_name']);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error.$install['go_back']);
}

$sql = explode(';',file_get_contents("install.sql"));
$con->query("SET NAMES 'utf8'");//数据库编码
$con->query("SET time_zone = '+8:00'");
//执行sql语句
foreach ($sql as $value) {
   $con->query($value . ';');
}
User::register($install['admin_user'], md5($install['admin_pawd']),$install['admin_mail'],2);
$con->close();
/*写入配置文件*/
$myfile = fopen("../common/config.php", "w") or die("Unable to open file!");
$txt = "<?php
define('mysql_servername','$db_host'); //主机地址，默认为localhost
define('mysql_username','$db_usr'); //数据库用户名
define('mysql_password','$db_pwd');//数据库密码
define('mysql_database','$db_name'); //数据库名
?>";
fwrite($myfile, $txt);
fclose($myfile);
$etime = microtime(true);//获取程序执行结束的时间
$total = $etime - $stime;   //计算差值
echo "<p>安装完成。安装过程共耗时$total 秒"; /*
?>
<div class="well" align="center">
安装完成。您可以<a href="../" class="btn btn-primary">查看站点</a>
亦或者<a href="../user/login.php" class="btn btn-primary">登录</a>
</div>
</body>
</html>