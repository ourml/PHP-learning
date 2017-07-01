<?php 
// 2-testGD

$width=500;
$height=300;
// 创建画布
$image = imagecreatetruecolor($width, $height);

// 定义颜色
$red = imagecolorallocate($image, 255, 0, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$white = imagecolorallocate($image, 255, 255, 255);

// 水平画一个字符
imagechar($image, 5, 10, 100, 'c', $red);

// 垂直画一个字符
imagecharup($image, 5, 100, 15, 'k', $blue);

// 水平画字符串
imagestring($image, 5, 200, 110, "Hello world", $white);

// 告诉浏览器以图象形式
header('content-type:image/jpeg');

// 输出图像
imagejpeg($image);

// 销毁图像
imagedestroy($image);