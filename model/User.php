<?php

class User
{

    public $id;
    public $name;
    public $avatar;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

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
        return new User($row['uid'], $row['usr']);
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

}

