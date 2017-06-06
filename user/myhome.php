<?php
//TODO 解决用户名为中文的头像上传失败问题
/*配置文件检测*/
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
/*基础参数赋值*/
$baseurl = '..';
$body = 'myhome.partial.php';


/*引入初始文件*/
require_once '../common/includes/common.php';
/*引入Model类*/
require_once '../model/Home.php';

/*判断用户是否登录*/
session_start();
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}else{
    header("location:../");
}
/*判断action参数是否合法*/
$action = array("index","avatar","myinfo","mytopic","message","changepwd");
$page['body']['action'] = @$_REQUEST["action"];
if (!(in_array($page['body']['action'] , $action))){
    $page['body']['action'] = 'index';
}
/*头像上传操作*/
if (!empty($_POST['avatar'])) {
    $upload=Home::Upload("$baseurl/static/img/avatars/$user->name.png");
    //print_r($upload);
    if ($upload[3]==0){
        array_push($page['message']['accept'], '头像设置成功');
    }else{
        array_push($page['message']['error'], '头像设置失败');
    }
}
/*恢复默认头像操作*/
if (!empty($_POST['c-avatar'])) {
    unlink("$baseurl/static/img/avatars/$user->name.png");
    array_push($page['message']['accept'], '默认头像恢复成功');
}
/*修改个人信息操作*/
if (!empty($_POST['info'])) {
    $sex= $_POST["sex"];
    $date= $_POST["date"];
    $email= $_POST["email"];
    if($sex!=1 and $sex!=2){
        array_push($page['message']['error'], '性别输入错误');
    }
    if($date==null){
        array_push($page['message']['error'], '出生日期不能为空');
    }
    if($email==null){
        array_push($page['message']['error'], '电子邮箱不能为空');
    }
    if (strstr($email,"@")==false){
        array_push($page['message']['error'], '电子邮箱格式错误');
    }
    if (empty($page['message']['error'])) {
        try {
            Home::changeinfo($sex, $date, $email, $user->id);
        }
        catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
        array_push($page['message']['accept'], '个人信息修改成功');
    }
}
$page['body']['class'] = 'myhome';
$page['header']['title'] = '个人中心';
/*引入模板*/
require '../template/layout.php';

