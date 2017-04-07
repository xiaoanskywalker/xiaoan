<?php 
header("Content-type:text/html;charset=UTF-8");
include("header.php");
echo "<h3>第三步-<span class='label label-info'>填写数据库及创始人信息</span></h3>";
if(file_exists("../common/config.php"))
{die ("请删除./common/config.php 后才能安装！<a href='index.php' class='btn btn-primary'>返回</a>");}
?>
<p>安装程序要求您填写您网站的数据库及创始人信息。<br>
只有填写正确的信息后，安装程序才能在您网站的数据库下插入数据表以及网站创始人数据并继续运行。填写错误的信息将会导致本程序安装失败。
</p>
<form name="login" action="step-4.php" method=post >  
<fieldset id="tb">
<legend><strong>1.数据库信息</strong></legend>
    <table width="635" border="0">
     <tr>
        <td width="112">数据库服务器：</td>
        <td width="245"><input type="text" value="localhost" class="form-control" name="db_host" ></td>
        <td>*数据库的服务器地址，一般为localhost</td>
      </tr>
      <tr>
        <td>数据库用户名：</td>
        <td><input type="text" value="root" class="form-control" name="db_usr"></td>
        <td>*</td>
       </tr>
       <tr>
        <td>数据库密码：</td>
        <td><input type="text" value="" class="form-control" name="db_pwd"></td>
        <td>&nbsp;</td>
       </tr>
       <tr>
        <td>数据库名：</td>
        <td><input type="text" class="form-control" name="db_name"></td>
        <td>*</td>
       </tr>
     </table>
</fieldset>
<fieldset id="tb">
<legend><strong>2.管理员信息</strong></legend>
<table width="635" border="0">
       <tr>
        <td>管理用户名</td>
        <td><input type="text"class="form-control" name="admin_usr"></td>
        <td>*</td>
       </tr>
       <tr>
        <td>管理员密码</td>
        <td><input type="text"class="form-control" name="admin_pwd"></td>
        <td>*</td>
       </tr>
       <tr>
        <td>管理员邮箱</td>
        <td><input type="text"class="form-control" name="admin_email"></td>
        <td>*用于接受升级提醒、漏洞修复等</td>
       </tr>
     </table>
  </fieldset>
<center>我已确认上述信息均填写正确，并<input name="log" type = "submit" class="btn btn-success btn-lg" value = "继续安装">
或<a href="step-2.php" class="btn btn-primary">返回</a></center>
</form>
</body>
</html>