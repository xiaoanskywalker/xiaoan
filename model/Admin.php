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

    function __construct($usernumber,$topicnumber,$replynumber,$dbsize,$t_id,$t_user,$t_title,$t_context,$t_time){
        $this->usernumber = $usernumber;
        $this->topicnumber = $topicnumber;
        $this->replynumber = $replynumber;
        $this->dbsize = $dbsize;
        $this->t_id = $t_id;
        $this->t_user = $t_user;
        $this->t_title = $t_title;
        $this->t_context = $t_context;
        $this->t_time = $t_time;
    }

    static function from($row)
    {
        if (!$row) {
            return null;
        }
        return new Admin($row['count( * )'],$row['count( * )'],$row['count( * )'], $row['sum( DATA_LENGTH ) + sum( INDEX_LENGTH )'],$row['tid'],
            $row['users'],$row['titles'],$row['posts'],$row['date']);
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
        $stat = $con->prepare("UPDATE wtb_settings SET webname=?,keywords=?,description=?,ifopen=? WHERE sid=1");
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
        $stat = $con->prepare("SELECT * FROM wtb_titles where topictype=0  LIMIT ?,?");
        $stat->bind_param('ii',$limit[0],$limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Admin::from($row));
        }
        return $arr;
    }
}