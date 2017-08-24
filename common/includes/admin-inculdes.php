<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /common/includes/admin-includes.php
 */
if (!empty($_POST['login'])) {
    /*管理员二次登录操作*/
    $pwd = $_POST["password"];
    $code = $_POST["checkcode"];

    if (empty($pwd)) {
        array_push($page['message']['error'], '密码为空');
    }
    $check = Site::checkcode($code);
    if ($check==0){
        array_push($page['message']['error'], '验证码错误');
    }

    if (empty($page['message']['error'])) {
        try {
            $user = User::login($user->name, $pwd);
            $_SESSION["admin"] = $user;
            $_SESSION["welcome"] = 1;
            header("location:./");
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }

    }
}

if (!empty($_POST['settings'])) {
    $ifopen = $_POST["ifopen"];
    $checkcode = $_POST["checkcode"];
    $webname = $_POST["webname"];
    $keywords = $_POST["keywords"];
    $description = $_POST["description"];

    if ($ifopen != 1 and $ifopen != 0) {
        array_push($page['message']['error'], '是否开启站点选项填写错误');
    }
    if ($checkcode != 1 and $checkcode != 0) {
        array_push($page['message']['error'], '是否开启验证码选项填写错误');
    }

    if (empty($page['message']['error'])) {
        try {
            Admin::changesettings($ifopen, $webname, $keywords, $description,$checkcode);
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
        array_push($page['message']['accept'], '设置保存成功');
    }
}

if (!empty($_POST['recovertopics'])) {
    $chk = $_POST["chk"];
    $retid = array();
    if(count($chk) == 0){
        array_push($page['message']['error'], '请至少选择一个帖子');
    }
    if (empty($page['message']['error'])) {
        try{
            foreach ($chk as $key=>$value){
                array_push($retid,$key);
            }
            foreach($retid as $value){
                Admin::changetopictype($value,1);
            }
            array_push($page['message']['accept'], '帖子恢复成功');
        }catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
    }
}
if (!empty($_POST['topicsetting'])) {
    $allow = $_POST["allow"];
    $prefix = $_POST["prefix"];

    if ($allow != 1 and $allow != 0) {
        array_push($page['message']['error'], '是否允许发帖选项填写错误');
    }

    if (empty($page['message']['error'])) {
        try {
            Admin::changetopicsetting($allow,$prefix);
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
        array_push($page['message']['accept'], '设置保存成功');
    }
}
if (!empty($_POST['delusr'])) {
    $chk = $_POST["chk"];
    $retid = array();
    if(count($chk) == 0){
        array_push($page['message']['error'], '请至少选择一个用户');
    }
    if (empty($page['message']['error'])) {
        try{
            foreach ($chk as $key=>$value){
                array_push($retid,$key);
            }
            foreach($retid as $value){
                if(User::get($value)->admingp != 0){
                    throw new Exception ("无法删除管理员");
                }
                if(file_exists("$baseurl/static/img/avatars/".User::get($value)->name.".png")){
                    unlink("$baseurl/static/img/avatars/".User::get($value)->name.".png");
                }
                Admin::delusr($value);
            }
            array_push($page['message']['accept'], '用户删除成功');
        }catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
    }
}
if (!empty($_POST['usrtyp'])) {
    $type =  $_POST["usrsel"];
    $chk = $_POST["chk"];
    $retid = array();
    if(count($chk) == 0){
        array_push($page['message']['error'], '请至少选择一个用户');
    }
    if($type != 0 and $type != 1){
        array_push($page['message']['error'], '用户组错误');
    }

    if (empty($page['message']['error'])) {
        try {
            foreach ($chk as $key=>$value){
                array_push($retid,$key);
            }
            foreach($retid as $value){
                if(User::get($value)->admingp == 2){
                    throw new Exception ("无法更改超级管理员用户组");
                }
                Admin::changeusergroup($value,$type);
            }
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
        array_push($page['message']['accept'], '用户组设置成功');
    }
}

if (!empty($_POST['adduser'])) {
    $user = @$_POST["usr"];
    $pawd = @$_POST["pwd"];
    $mail = @$_POST["email"];
    $gp = @$_POST["user"];

    if($user == null or $pawd == null or $mail == null){
        array_push($page['message']['error'], '用户名、密码或电子邮箱为空');
    }
    if($gp != 0 and $gp != 1){
        array_push($page['message']['error'], '用户组类型错误');
    }

    if (empty($page['message']['error'])) {
        try {
            User::register($user,md5($pawd),$mail,$gp);
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
        array_push($page['message']['accept'], '用户添加成功');
    }
}
if (!empty($_POST['usersetting'])) {
    $allowreg = @$_POST["allowreg"];
    if ($allowreg != 0 and $allowreg != 1){
        array_push($page['message']['error'], '是否运行注册选项填写错误');
    }
    if (empty($page['message']['error'])) {
        try {
            Admin::allowreg($allowreg);
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
        array_push($page['message']['accept'], '设置保存成功');
    }
}
if (!empty($_POST['endblock'])) {
    $chk = $_POST["chk"];
    $retid = array();
    if(count($chk) == 0){
        array_push($page['message']['error'], '请至少选择一个用户');
    }
    if (empty($page['message']['error'])) {
        try{
            foreach ($chk as $key=>$value){
                array_push($retid,$key);
            }
            foreach($retid as $value){
                User::endblock($value);
            }
            array_push($page['message']['accept'], '用户解封成功');
        }catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
    }
}
if (!empty($_POST['recoverreplys'])) {
    $chk = $_POST["chk"];
    $retid = array();
    if(count($chk) == 0){
        array_push($page['message']['error'], '请至少选择一个帖子');
    }
    if (empty($page['message']['error'])) {
        try{
            foreach ($chk as $key=>$value){
                array_push($retid,$key);
            }
            foreach($retid as $value){
               Admin::recoverreply($value);
            }
            array_push($page['message']['accept'], '回帖恢复成功');
        }catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
    }
}