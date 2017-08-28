<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2 1
 * Author: Xiaoan
 * File: /model/User.php
 */
class User{
    public $id;
    public $name;
    public $password;
    public $avatar;
    public $admingp;
    public $endblock;
    public $b_uid;
    public $b_startblock;
    public $b_operate;

    function __construct($id, $name, $password, $admingp,$endblock,$b_uid,$b_startblock,$b_operate){
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->admingp = $admingp;
        $this->b_endblock = $endblock;
        $this->b_uid = $b_uid;
        $this->b_startblock = $b_startblock;
        $this->b_operate = $b_operate;

        //TODO 路劲绝对地址
        //echo $name;
        $file = "/static/img/avatars/" . $name . ".png";
        if (file_exists($file)) {
            $this->avatar = $file;
        } else {
            $this->avatar = '/static/img/avatar.jpg';
        }
    }

    static function from($row){
        if (!$row) {
            return null;
        }
        return new User($row['uid'], $row['usr'], $row['pwd'],$row["admingp"],$row['endblock'],$row['blockuid'],$row['startblock'],$row['operateuid']);
    }

    static function avatar($user,$baseurl){
        $file = "$baseurl/static/img/avatars/$user.png";
        if (file_exists($file)) {
            return $file;
        } else {
            return  $baseurl.'/static/img/avatar.jpg';
        }
    }

    static function get($id){
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_users where uid=?");
        $stat->bind_param('i', $id);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return User::from($row);
    }

    static function getByName($name){
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_users where usr=?");
        $stat->bind_param('s', $name);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return User::from($row);
    }

    static function getByMail($mail){
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_users where email=?");
        $stat->bind_param('s', $mail);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return User::from($row);
    }


    static function login($uar, $pwd){
        /*用户登录 user login*/
        $user = User::getByName($uar);
        if ($user == null) {
            $user = User::getByMail($uar);
        }
        if ($user == null) {
            throw new Exception('用户不存在');
        }
        if ($user->password == md5($pwd)) {
            return $user;
        } else {
            throw new Exception('密码错误');
        }
    }

    static function register($usr, $pwd, $email,$group){
        /*用户注册 user register*/
        global $con;
        $user = User::getByMail($email);
        if ($user) {
            throw new Exception('该邮箱已被注册');
        }
        $user = User::getByName($usr);
        if ($user) {
            throw new Exception('用户已存在');
        }

        $time = date('Y-m-d h:m:s');
        $stat = $con->prepare("INSERT INTO wtb_users VALUES (null,?,?,?,?,1,'2017-01-01',?)");
        $stat->bind_param('sssis',$usr,$pwd,$email,$group,$time);
        $stat->execute();
        $user = User::getByName($usr);
        return $user;
    }

    static function logout(){
        /*退出登录 user logout*/
        unset($_SESSION["user"]);
        unset($_SESSION["admin"]);
    }

    static function adminlogout(){
        /*管理员退出登录 user logout*/
        unset($_SESSION["admin"]);
    }

    static function changepwd($uid,$pwd0,$pwd1){
        /*修改密码 change password*/
        $user = User::get($uid);
        if ($user->password != $pwd0) {
            throw new Exception('原密码错误,请检查');
        }
        global $con;
        $stat = $con->prepare("UPDATE wtb_users SET pwd=? WHERE uid=?");
        $stat->bind_param('si',$pwd1,$uid);
        $stat->execute();
        return 1;
    }

    static function ifblock($uid){
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_blockuser WHERE blockuid=?");
        $stat->bind_param('i', $uid);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return User::from($row);
    }

    static function endblock($uid){
        global $con;
        $stat = $con->prepare("DELETE FROM wtb_blockuser WHERE blockuid=?");
        $stat->bind_param('i',$uid);
        $stat->execute();
    }
}