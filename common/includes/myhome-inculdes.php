<?php
/*修改密码操作 action of change password*/
if (!empty($_POST['changepwd'])){
    $pwd0 = $_POST["password0"];
    $pwd1 = $_POST["password1"];
    $pwd2 = $_POST["password2"];
    $code = $_POST["checkcode"];
    if ($pwd0==null or $pwd1==null or $pwd2==null) {
        array_push($page['message']['error'], '请填写原密码、新密码及确认密码');
    }
    if ($pwd1 != $pwd2) {
        array_push($page['message']['error'], '新密码与确认密码输入不一致，请检查');
    }
    if ($pwd0 == $pwd1) {
        array_push($page['message']['error'], '原密码与新密码输入一致，请更改新密码');
    }
    $check = Site::checkcode($code);
    if ($check==0){
        array_push($page['message']['error'], '验证码错误，请重新输入');
    }
    $pwd1=md5($pwd1);//密码MD5加密 MD5 encryption of password
    $pwd0=md5($pwd0);
    if (empty($page['message']['error'])) {
        try {
            User::changepwd($user->id,$pwd0,$pwd1);
            array_push($page['message']['accept'], '密码修改成功，新密码为：&nbsp;'.$pwd2);
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
    }
}

/*修改个人信息操作 action of change personal information*/
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

/*恢复默认头像操作 action of recover the default avatar*/
if (!empty($_POST['c-avatar'])) {
    unlink("$baseurl/static/img/avatars/$user->name.png");
    array_push($page['message']['accept'], '默认头像恢复成功');
}

/*头像上传操作 action of upload avatar*/
if (!empty($_POST['avatar'])) {
    $upload=Home::Upload("$baseurl/static/img/avatars/$user->name.png");
    //print_r($upload);
    if ($upload[3]==0){
        array_push($page['message']['accept'], '头像设置成功');
    }else{
        array_push($page['message']['error'], '头像设置失败');
    }
}