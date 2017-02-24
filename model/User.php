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
        global $con;
        $user = User::getByName($uar);
        if ($user == null) {
            $user = User::getByMail($uar);
        }
        if ($user != null && $user->password == md5($pwd)) {
            return $user;
        }
        return null;
    }

    static function showprefix(){
        global $con;
        $row = mysqli_fetch_row(mysqli_query($con,"SELECT * FROM wtb_topic_settings where tsid=1"));
        return $row[1];
    }

}

