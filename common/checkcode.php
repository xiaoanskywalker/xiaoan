<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /common/checkcode.php
 */
session_start();
function getnumber() {
    $plus =  rand(1,2);
    $num1 = rand(15,24);
    $num2 = rand(5,14);
    if($plus == 1){
        $_SESSION["verification"] = $num1 + $num2;
        return"$num1+$num2=?";
    }else{
        $_SESSION["verification"] = $num1 - $num2;
        return"$num1-$num2=?";
    }
}
 $str = getnumber(); //随机生成的字符串
 $width  = 75;  //验证码图片的宽度
 $height = 25;//验证码图片的高度
 @ header("Content-Type:image/png");//声明需要创建的图层的图片格式
 $im = imagecreate($width, $height);//创建一个图层
 $back = imagecolorallocate($im, 0xFF, 0xFF, 0xFF); //背景色
 $pix  = imagecolorallocate($im, 187, 230, 247); //模糊点颜色
 $font = imagecolorallocate($im, 41, 163, 238); //字体色
 mt_srand(); //绘模糊作用的点
 for ($i = 0; $i < 1000; $i++) {
     imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $pix);
 }
 imagestring($im, 5, 7, 5, $str, $font); //输出字符
 imagerectangle($im, 0, 0, $width -1, $height -1, $font); //输出矩形
 imagepng($im); //输出图片
 imagedestroy($im);