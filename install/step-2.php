<?php
header("Content-type:text/html;charset=gb2312");
include("../common/install_header.php");
echo "<h3>第二步-<span class='label label-info'>服务器配置检查</span></h3>";
if(file_exists("../common/config.php"))
{die ("请删除./common/config.php 后才能安装！<a href='index.php' class='btn btn-primary'>返回</a>");}
?>
<p>安装程序将对您的服务器配置环境进行检测，请确保所有项目均符合最低配置要求。
如果不符合要求而强行安装，则可能会导致安装失败或者安装后无法使用的后果。</p>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>功能或状态</th>
        <th>最低配置要求</th>
        <th>当前配置</th></tr>
    </thead>
    <tbody>
      <tr>
        <td>PHP版本</td>
        <td>5.3+</td>
        <td><b><font color="<?php
        if (version_compare(PHP_VERSION, '5.0.0') >= 0) 
        {echo"green";}
        else {echo "red";}
        ?>
        ">
        <?php echo PHP_VERSION;?>
        </font></b></td></tr>
      <tr>
        <td>连接数据库函数：mysql_connect</td>
        <td>支持</td>
        <td><b>
        <?php
        if (function_exists('mysql_connect'))
        {echo "<font color='green'>支持</font>";}
        else
        {echo "<font color='red'>不支持</font>";}
        ?></b></td></tr>
      <tr>
        <td>执行SQL语句函数：mysql_query</td>
        <td>支持</td>
        <td><b>
        <?php
        if (function_exists('mysql_query'))
        {echo "<font color='green'>支持</font>";}
        else
        {echo "<font color='red'>不支持</font>";}
        ?></b></td></tr>
      <tr>
        <td>配置文件conn.php支持写入情况</td>
        <td>支持</td>
        <td><b>
        <?php
        if (is_writable("../conn.php")) 
        {echo "<font color='green'>支持</font>";}
        else
        {echo "<font color='red'>不支持</font>";}
        ?></b></td></tr>
    </tbody>
  </table>
  
<center>
我已确认服务器配置均支持，并
<a href="step-3.php" class="btn btn-primary">继续安装</a>或
<a href="index.php" class="btn btn-primary">返回</a></center>
</body>
</html>