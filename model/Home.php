<?php
class Home{

    static function Upload($filename){
        if($dir==null){
            return 0;
        }
        $show=array();
        array_push($show,$_FILES['myFile']['name']);
        array_push($show,$_FILES['myFile']['size']);
        array_push($show,$_FILES['myFile']['type']);
        array_push($show,$_FILES['myFile']['error']);
        move_uploaded_file($_FILES["myFile"]["tmp_name"],$filename);
        array_push($show,$dir.$_FILES["myFile"]["name"]);
        return $show;//1
    }
}