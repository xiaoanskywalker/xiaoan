<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /model/Admin.php
 */
class Admin{

    public $usernumber;
    public $topicnumber;
    public $replynumber;
    public $dbsize;
    public $t_id;
    public $t_user;
    public $t_title;
    public $t_context;
    public $t_time;
    public $u_id;
    public $u_name;
    public $u_regtime;
    public $u_admingp;

    function __construct($usernumber,$topicnumber,$replynumber,$dbsize,$t_id,$t_user,$t_title,$t_context,$t_time,$u_id,$u_name,
                         $u_regtime,$u_admingp){
        $this->usernumber = $usernumber;
        $this->topicnumber = $topicnumber;
        $this->replynumber = $replynumber;
        $this->dbsize = $dbsize;
        $this->t_id = $t_id;
        $this->t_user = $t_user;
        $this->t_title = $t_title;
        $this->t_context = $t_context;
        $this->t_time = $t_time;
        $this->u_id = $u_id;
        $this->u_name = $u_name;
        $this->u_regtime = $u_regtime;
        $this->u_admingp = $u_admingp;
    }

    static function from($row)
    {
        if (!$row) {
            return null;
        }
        return new Admin($row['count( * )'],$row['count( * )'],$row['count( * )'], $row['sum( DATA_LENGTH ) + sum( INDEX_LENGTH )'],$row['tid'],
            $row['users'],$row['titles'],$row['posts'],$row['date'],$row["uid"],$row["usr"],$row["regtime"],$row["admingp"]);
    }

    static function getusernum(){
        global $con;
        $result = $con->query("SELECT count( * ) FROM wtb_users");
        $row = $result->fetch_array();
        return Admin::from($row);
    }

    static function gettopicnum(){
        global $con;
        $result = $con->query("SELECT count( * ) FROM wtb_titles");
        $row = $result->fetch_array();
        return Admin::from($row);
    }

    static function getreplynum(){
        global $con;
        $result = $con->query("SELECT count( * ) FROM wtb_reply");
        $row = $result->fetch_array();
        return Admin::from($row);
    }

    static function dbsize($dbname){
        global $con;
        $stat = $con->prepare("SELECT sum( DATA_LENGTH ) + sum( INDEX_LENGTH ) FROM information_schema.TABLES WHERE TABLE_SCHEMA =?");
        $stat->bind_param('s', $dbname);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return Admin::from($row);
    }

    static function changesettings($ifopen,$webname ,$keywords ,$description ){
        global $con;
        $stat = $con->prepare("UPDATE wtb_settings SET webname=?,keywords=?,description=?,opened=? WHERE sid=1");
        $stat->bind_param('sssi',$webname,$keywords,$description,$ifopen);
        $stat->execute();
    }

    static function changetopictype($tid,$type){
        global $con;
        $stat = $con->prepare("UPDATE wtb_titles SET topictype=? WHERE tid=?");
        $stat->bind_param('ii',$type,$tid);
        $stat->execute();
    }

    static function topicbin($page){
        global $con;
        $limit = array();
        $limit[0] = ($page-1) * Site::$page_count;
        $limit[1] = $page * Site::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_titles where topictype=0  ORDER BY tid DESC  LIMIT ?,?");
        $stat->bind_param('ii',$limit[0],$limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Admin::from($row));
        }
        return $arr;
    }

    static function changetopicsetting($allowed,$prefix){
        global $con;
        $stat = $con->prepare("UPDATE wtb_settings SET prefix=?,allowpost=? WHERE sid=1");
        $stat->bind_param('si',$prefix,$allowed);
        $stat->execute();
    }

    static function listuser($page){
        global $con;
        $limit = array();
        $limit[0] = ($page-1) * Site::$page_count;
        $limit[1] = $page * Site::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_users  ORDER BY uid DESC  LIMIT ?,?");
        $stat->bind_param('ii',$limit[0],$limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Admin::from($row));
        }
        return $arr;
    }

    static function delusr($uid){
        global $con;
        $stat = $con->prepare("DELETE FROM wtb_users WHERE uid=?;");
        $stat->bind_param('i',$uid);
        $stat->execute();
    }
}