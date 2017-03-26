<?php
error_reporting(0);
function error_handler($error_level,$error_message,$file,$line){
    switch($error_level){
        case E_NOTICE:
        case E_USER_NOTICE:
            $error_type = '注意';
            break;
        case E_WARNING:
        case E_USER_WARNING:
            $error_type='警告';
            break;
        case E_ERROR:
        case E_USER_ERROR:
        case E_COMPILE_ERROR:
            $error_type='致命错误';
            break;
        default:
            $error_type='未知错误';
            break;
        case E_PARSE:
            $error_type = '语法错误';
            break;
    }
    printf("<b>%s：</b>%s <p><b> 文件路径：</b>%s<b>行数：</b>%d<p>\n",$error_type, $error_message, $file, $line);
    exit;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Xiaoanbbs System Error</title>
    <style>
        H1 {color:red }
        H3 {color:maroon }
    </style>
</head>

<body bgcolor="white">

            <span>
                <H1>Xiaoanbbs System Error</H1>
                <hr width=100% size=1 color=silver>
                <h3><i>程序在运行时出错。下面是错误报告，</i> </h3>
            </span>
            <p></p>
<?php
set_error_handler('error_handler');
?>

</body>
</html>


