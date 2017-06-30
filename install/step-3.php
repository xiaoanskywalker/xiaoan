<?php include("header.php"); ?>
<h3><span class='label label-info'>3/5</span>--填写相关信息</h3>
<form name="login" action="step-4.php" method=post >
    <fieldset id="tb">
        <legend>
            <strong>1.数据库信息</strong>
        </legend>
        <table border="0">
            <tr>
                <td>数据库服务器：</td>
                <td><input type="text" value="localhost" class="form-control" name="db_host" ></td>
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
        <legend>
            <strong>2.管理员信息</strong>
        </legend>
        <table border="0">
            <tr>
                <td>管理员用户名</td>
                <td><input type="text"class="form-control" name="admin_usr" value="admin"></td>
                <td>*</td>
            </tr>
            <tr>
                <td>管理员密码</td>
                <td><input type="text"class="form-control" name="admin_pwd"></td>
                <td>*密码必须超过6位</td>
            </tr>
            <tr>
                <td>管理员密码确认</td>
                <td><input type="text"class="form-control" name="admin_pwd2"></td>
                <td>*</td>
            </tr>
            <tr>
                <td>管理员邮箱</td>
                <td><input type="text"class="form-control" name="admin_email" value="admin@admin.com"></td>
                <td>*用于接受升级提醒、漏洞修复等，也是管理员的登录账号</td>
            </tr>
        </table>
    </fieldset>

    <fieldset id="tb">
        <legend>
            <strong>3.站点信息</strong>
        </legend>
        <table border="0">
            <tr>
                <td>站点名称</td>
                <td><input type="text"class="form-control" name="site_name" value="小安社区"></td>
                <td>*</td>
            </tr><!--
            <tr>
                <td>管理员密码</td>
                <td><input type="text"class="form-control" name="admin_pwd"></td>
                <td>*</td>
            </tr>
            <tr>
                <td>管理员邮箱</td>
                <td><input type="text"class="form-control" name="admin_email"></td>
                <td>*用于接受升级提醒、漏洞修复等，也是管理员的登录账号</td>
            </tr>-->
        </table>
    </fieldset>
    <center>
        <input name="log" type = "submit" class="btn btn-primary" value = "下一步">
        &nbsp;<a href="step-2.php" class="btn btn-primary">上一步</a>
    </center>
</form>
</body>
</html>