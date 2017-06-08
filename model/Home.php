<?php
class Home{

    public $email;
    public $sex;
    public $regtime;
    public $admingp;
    public $birthday;
    public $title;
    public $content;
    public $topdate;

    function __construct($email,$sex,$regtime,$admingp,$birthday,$title,$content,$topdate)
    {
        $this->email = $email;
        $this->sex = $sex;
        $this->regtime = $regtime;
        $this->admingp = $admingp;
        $this->birthday = $birthday;
        $this->title = $title;
        $this->content = $content;
        $this->topdate = $topdate;
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
        return new Home($row['email'],$row['sex'],$row['regtime'],$row['admingp'],$row['birthday'],$row['titles'],$row['posts'],$row['date']);
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

    static function mytopic($user){
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_titles where users=?");
        $stat->bind_param('s',$user);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Home::from($row));
        }
        return $arr;
    }
}