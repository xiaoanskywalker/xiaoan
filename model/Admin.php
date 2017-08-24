<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
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

    static function changesettings($ifopen,$webname ,$keywords ,$description,$checkcode){
        global $con;
        $stat = $con->prepare("UPDATE wtb_settings SET webname=?,keywords=?,description=?,opened=?,checkcode=? WHERE sid=1");
        $stat->bind_param('sssii',$webname,$keywords,$description,$ifopen,$checkcode);
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

    static function changeusergroup($uid,$gp){
        global $con;
        $stat = $con->prepare("UPDATE wtb_users SET admingp=? WHERE uid=?");
        $stat->bind_param('ii',$gp,$uid);
        $stat->execute();
    }

    static function maxuid(){
        global $con;
        $result = $con->query("SELECT max(uid) AS uid FROM wtb_users");
        $row = $result->fetch_array();
        return Admin::from($row);
    }

    static function allowreg($ifallow){
        global $con;
        $stat = $con->prepare("UPDATE wtb_settings SET allowreg=? WHERE sid=1");
        $stat->bind_param('i',$ifallow);
        $stat->execute();
    }

    static function listblockuser($page){
        global $con;
        $limit = array();
        $limit[0] = ($page-1) * Site::$page_count;
        $limit[1] = $page * Site::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_blockuser  ORDER BY bid DESC  LIMIT ?,?");
        $stat->bind_param('ii',$limit[0],$limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, User::from($row));
        }
        return $arr;
    }

    static function getendtime($category,$bantime){
        if($category == "12h"){
            return date("Y-m-d H:i:s",strtotime("+12 hours"));
        }elseif($category == "1d"){
            return date("Y-m-d H:i:s",strtotime("+1 day"));
        }elseif($category == "7d"){
            return date("Y-m-d H:i:s",strtotime("+1 week"));
        }elseif($category == "1m"){
            return date("Y-m-d H:i:s",strtotime("+1 month"));
        }elseif($category == "1y"){
            return date("Y-m-d H:i:s",strtotime("+1 year"));
        }elseif($category == "s"){
            return $bantime;
        }else{
            return "2038-1-19 03:14:07";
        }
    }

    static function newblock($blockuid,$endblock,$operateuid){
        global $con;
        $stat = $con->prepare("INSERT INTO wtb_blockuser VALUES (null,?,?,?,?)");
        $stat->bind_param('issi',$blockuid,date("Y-m-d H:i:s"),$endblock,$operateuid);
        $stat->execute();
    }

    static function updblock($blockuid,$endblock,$operateuid){
        global $con;
        $stat = $con->prepare("UPDATE wtb_blockuser SET endblock=? ,operateuid=? WHERE blockuid=? ");
        $stat->bind_param('sii',$endblock,$operateuid,$blockuid);
        $stat->execute();
    }

    static function replybin($page){
        global $con;
        $limit[0] = ($page-1) * Post::$page_count;
        $limit[1] = $page * Post::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_reply WHERE deleted=1 ORDER BY rid DESC limit ?,?");
        $stat->bind_param('ii',$limit[0], $limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Post::from($row));
        }
        return $arr;
    }

    static function recoverreply($rid){
        global $con;
        $stat = $con->prepare("UPDATE wtb_reply SET deleted=0 WHERE rid=?");
        $stat->bind_param('i',$rid);
        $stat->execute();
    }
}