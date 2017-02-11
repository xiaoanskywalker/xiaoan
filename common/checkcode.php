<?php  
session_start();
 function random($len) {
     $srcstr = "1a2s3d4f5g6hj8k9qwertyupzxcvbnm";
     mt_srand();
     $strs = "";
     for ($i = 0; $i < $len; $i++) {
         $strs .= $srcstr[mt_rand(0, 30)];
     }
     return $strs;
 }
 $str = random(4); //随机生成的字符串
 $width  = 50;  //验证码图片的宽度
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
$str=md5($str);
 //选择 Session
 $_SESSION["verification"] = $str;
 ?>
