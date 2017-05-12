<?php
class Home{

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
        array_push($show,$dir.$_FILES["myFile"]["name"]);//上传后的文件名
        return $show;
    }
}