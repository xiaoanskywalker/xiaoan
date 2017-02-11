<?php
session_start();
if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
?>
<div id="fundetail">
    <center>
        <h4>服务器详细信息</h4>PHP信息
        <table class="table">
            <tr>
                <td>PHP版本：</td>
                <td><?php echo PHP_VERSION;?></td>
                <td>ZEND版本：</td>
                <td><?php echo Zend_Version();?></td>
            </tr>
            <tr>
                <td>PHP运行方式：</td>
                <td><?php echo php_sapi_name();?></td>
                <td>PHP安装路径：</td>
                <td><?php echo DEFAULT_INCLUDE_PATH;?></td>
            </tr>
            <tr>
                <td>PHP脚本超时时间：</td>
                <td><?php echo ini_get("max_execution_time");?>s</td>
                <td>PHP文件上传大小限制：</td>
                <td><?php echo ini_get("upload_max_filesize");?></td>
            </tr>
        </table>
        WEB服务器信息
        <table class="table">
            <tr>
                <td>服务器解释引擎：</td>
                <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
            </tr>
            <tr>
                <td>服务器域名：</td>
                <td><?php echo $_SERVER["HTTP_HOST"];?></td>
                <td>MySQL版本：</td>
                <td><?php echo mysql_get_server_info();?></td>
            </tr>
            <tr>
                <td>前进程用户名：</td>
                <td><?php echo Get_Current_User();?></td>
                <td>服务器Web端口：</td>
                <td><?php echo $_SERVER['SERVER_PORT'];?></td>
            </tr>
        </table>
        服务器系统信息
        <table class="table">
            <tr>
                <td>服务器操作系统：</td>
                <td><?php echo php_uname();?></td>
            </tr>
            <tr>
                <td>服务器域名：</td>
                <td><?php echo GetHostByName($_SERVER['SERVER_NAME']);?></td>
                <td>服务器CPU信息：</td>
                <td><?php echo $_SERVER['PROCESSOR_IDENTIFIER'];?></td>
            </tr>
            <tr>
                <td>服务器系统目录：</td>
                <td><?php echo $_SERVER['SystemRoot'];?></td>
                <td>服务器语言：</td>
                <td><?php echo  $_SERVER['HTTP_ACCEPT_LANGUAGE'];?></td>
            </tr>
            <tr>
                <td>服务器IP地址：</td>
                <td><?php echo $_SERVER['SERVER_PORT'];?></td>
                <td>服务器时间：</td>
                <td><?php echo date('Y-m-d H:i:s',time());?></td></tr>
            </table>
            其他信息
        <table class="table">
            <tr>
                <td>当前文件绝对路径：</td>
                <td><?php echo __FILE__;?></td>
                <td>客户端IP地址：</td>
                <td><?php echo $_SERVER['REMOTE_ADDR'];?></td>
            </tr>
            <tr>
                <td>当前URL：</td>
                <td><?php echo 'http(s)://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?></td>
                <td>当前客户端时间：</td>
                <td><div id="time"></div></td>
            </tr>
        </table>
            <iframe src="./includes/admin_phpinfo.php" height="500" width="100%" border="0" frameborder="no"></iframe>
    </center>
</div>
<script type="text/javascript">  
    //获取系统时间，将时间以指定格式显示到页面。  
    function systemTime()  
    {  
        //获取系统时间。  
        var dateTime=new Date();  
        var hh=dateTime.getHours();  
        var mm=dateTime.getMinutes();  
        var ss=dateTime.getSeconds();   
        //分秒时间是一位数字，在数字前补0。  
        mm = extra(mm);  
        ss = extra(ss);     
        //将时间显示到ID为time的位置，时间格式形如：19:18:02  
        document.getElementById("time").innerHTML=hh+":"+mm+":"+ss;            
        //每隔1000ms执行方法systemTime()。  
        setTimeout("systemTime()",1000);  
    }      
    //补位函数。  
    function extra(x)  
    {  
        //如果传入数字小于10，数字前补一位0。  
        if(x < 10)  
        {  
            return "0" + x;  
        }  
        else  
        {  
            return x;  
        }  
    }  
</script>  