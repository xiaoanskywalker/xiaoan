<?php

class User
{

    public $id;
    public $name;
    public $password;
    public $avatar;

    function __construct($id, $name, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;

        //TODO 路劲绝对地址
        $file = "/common/images/avatar/" . $name . ".png";
        if (file_exists($file)) {
            $this->avatar = $file;
        } else {
            $this->avatar = '/static/img/avatar.jpg';
        }
    }

    static function from($row)
    {
        if (!$row) {
            return null;
        }
        return new User($row['uid'], $row['usr'], $row['pwd']);
    }


    static function get($id)
    {
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_users where uid=?");
        $stat->bind_param('i', $id);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return User::from($row);
    }

    static function getByName($name)
    {
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_users where usr=?");
        $stat->bind_param('s', $name);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return User::from($row);
    }

    static function getByMail($mail)
    {
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_users where email=?");
        $stat->bind_param('s', $mail);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return User::from($row);
    }


    static function login($uar, $pwd)
    {
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

    static function show_prefix()
    {
        global $con;
        $row = $con->query("SELECT * FROM wtb_topic_settings where tsid=1")->fetch_row();
        return $row[1];
    }

    static function register($usr, $pwd, $email,$group)
    {
        global $con;
        $user = User::getByName($usr);
        if ($user) {
            throw new Exception('用户已存在');
        }
        $user = User::getByMail($email);
        if ($user) {
            throw new Exception('该邮箱已被注册');
        }

        $stat = $con->prepare("insert into wtb_users  values (null,?,?,?,?)");
        $stat->bind_param('sssi', $usr, $pwd, $email,$group);
        $stat->execute();
        $user=User::getByName($usr);
        $uid=$user->id;
        $time = date('Y-m-d h:m:s');
        $stat = $con->prepare("insert into wtb_userinfo  values (?,1,'0000-00-00',?,?)");
        $stat->bind_param('sss', $uid, $time, $email);
        $stat->execute();
        return $user;
        //return User::getByName($usr);
    }

}

