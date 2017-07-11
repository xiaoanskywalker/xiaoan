<?php
class Admin{

    public $usernumber;
    public $topicnumber;
    public $replynumber;
    public $dbsize;

    function __construct($usernumber,$topicnumber,$replynumber,$dbsize){
        $this->usernumber = $usernumber;
        $this->topicnumber = $topicnumber;
        $this->replynumber = $replynumber;
        $this->dbsize = $dbsize;
    }

    static function from($row)
    {
        if (!$row) {
            return null;
        }
        return new Admin($row['count( * )'],$row['count( * )'],$row['count( * )'],$row['sum( DATA_LENGTH ) + sum( INDEX_LENGTH )']);
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
}