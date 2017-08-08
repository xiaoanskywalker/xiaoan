<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /model/Home.php
 */
class Home{

    public $email;
    public $sex;
    public $regtime;
    public $admingp;
    public $birthday;
    public $title;
    public $content;
    public $topdate;
    public $tid;
    public $reply;
    public $repdate;
    public $replyuser;
    public $rid;

    function __construct($email,$sex,$regtime,$admingp,$birthday,$title,$content,$topdate,$tid,$reply,$repdate,$replyuser,$rid)
    {
        $this->email = $email;
        $this->sex = $sex;
        $this->regtime = $regtime;
        $this->admingp = $admingp;
        $this->birthday = $birthday;
        $this->title = $title;
        $this->content = $content;
        $this->topdate = $topdate;
        $this->tid = $tid;
        $this->reply = $reply;
        $this->repdate = $repdate;
        $this->replyuser = $replyuser;
        $this->rid = $rid;
    }
    static function Upload($filename){
        if($filename==null){
            return 0;
        }
        $show=array();
        array_push($show,$_FILES['myFile']['name']);//上传时的文件名
        array_push($show,$_FILES['myFile']['size']);//文件大小
        array_push($show,$_FILES['myFile']['type']);//文件类型
        array_push($show,$_FILES['myFile']['error']);//错误类型
        move_uploaded_file($_FILES["myFile"]["tmp_name"],$filename);
        array_push($show,$filename);//上传后的文件名
        return $show;
    }

    static function from($row)
    {
        if (!$row) {
            return null;
        }
        return new Home($row['email'],$row['sex'],$row['regtime'],$row['admingp'],$row['birthday'],$row['titles'],$row['posts'],$row['date'],$row['tid'],
            $row['reply'],$row['date'],$row['user'],$row['rid']);
    }

    static function myinfo($uid){
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_users where uid=?");
        $stat->bind_param('i', $uid);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return Home::from($row);
    }

    static function changeinfo($sex,$birthday,$email,$uid){
        global $con;
        $stat = $con->prepare("UPDATE wtb_users SET sex=?,birthday=?,email=? WHERE uid=?");
        $stat->bind_param('issi',$sex,$birthday,$email,$uid);
        $stat->execute();
    }

    static function mytopic($user,$page){
        global $con;
        $limit = array();
        $limit[0] = ($page-1) * Site::$page_count;
        $limit[1] = $page * Site::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_titles where users=? LIMIT ?,?");
        $stat->bind_param('sii',$user,$limit[0],$limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Home::from($row));
        }
        return $arr;
    }

    static function myreply($user,$page)
    {
        global $con;
        $limit = array();
        $limit[0] = ($page - 1) * Site::$page_count;
        $limit[1] = $page * Site::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_reply where user=? LIMIT ?,?");
        $stat->bind_param('sii', $user, $limit[0], $limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Home::from($row));
        }
        return $arr;
    }

    static function heorshe($sex){
        if($sex==1){
            return "他";
        }else{
            return "她";
        }
    }

    static function getage($birthday){
        $arr = explode("-",$birthday);//将出生日期按照年月日导入数组，以"-"符号为分界
        return $arr;
    }

    static function replyme($tid,$type,$page){
        global $con;
        $limit = array();
        $limit[0] = ($page-1) * Post::$page_count;
        $limit[1] = $page * Post::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_reply WHERE tid=? AND ifread=? ORDER BY rid DESC limit ?,?");
        $stat->bind_param('iiii',$tid,$type,$limit[0], $limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Home::from($row));
        }
        return $arr;
    }

    static function gettidbyuser($user){
        global $con;
        $tid = array();
        $sql = mysqli_query($con,"SELECT * FROM wtb_titles WHERE users = '$user' ORDER BY tid DESC");
        while($row = mysqli_fetch_row($sql)){
            array_push($tid,$row[0]);
        }
        return $tid;
    }

    static function haveread($rid){
        global $con;
        $stat = $con->prepare("UPDATE wtb_reply SET ifread=1 WHERE rid=?");
        $stat->bind_param('i',$rid);
        $stat->execute();
    }
}