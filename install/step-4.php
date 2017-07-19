<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /install/step-4.php
 */
/*开始计时*/
$stime = microtime(true);

/*引入Model类*/
require_once '../model/User.php';

/*引入头部文件*/
include("header.php");
?>
<h3>
    <span class="label label-info">4/5</span>-安装数据库
</h3><p>
<?php
/*定义数组1*/
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

/*读取SQL文件*/
$sql = explode(';',file_get_contents("install.sql"));

/*执行SQL语句*/
foreach ($sql as $value) {
   $con->query($value . ';');
}

/*添加超级管理员*/
User::register($install['admin_user'], md5($install['admin_pawd']),$install['admin_mail'],2);;

/*插入站点信息*/
$con->query("INSERT INTO wtb_settings (sid,webname,keywords,description,prefix,opened,allowpost,allowreg) VALUES
(1, '".$install['site_name']."', '小安社区 Xiaosnbbs', '小安社区，追求简单、极致', '【默认前缀】', 1, 1, 1);");
$con->close();

/*写入配置文件*/
$myfile = fopen("../common/config.php", "w") or die("Unable to open file!");
$txt = "<?php
define('mysql_servername','" .$install['db_host']. "'); //主机地址，默认为localhost,默认端口为3306,可添加端口号，例如localhost:8888
define('mysql_username','" .$install['db_user']. "'); //数据库用户名
define('mysql_password','" .$install['db_pawd']. "');//数据库密码
define('mysql_database','" .$install['db_name']. "'); //数据库名
?>";
fwrite($myfile, $txt);
fclose($myfile);

/*输出安装耗时*/
$etime = microtime(true);//获取程序执行结束的时间
$total = $etime - $stime;   //计算差值
echo "<p>安装完成。安装过程共耗时$total 秒";
?>
<div class="well" align="center">
数据已成功插入至您的数据库。<a href="step-5.php" class="btn btn-primary">下一步</a>
</div>
</body>
</html>