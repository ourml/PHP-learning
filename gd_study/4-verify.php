<?php 
// 创建画布
$width = 400;
$height = 50;

$image = imagecreatetruecolor($width, $height);

// 创建颜色
$white = imagecolorallocate($image, 255, 255, 255);
$randColor = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));

// 绘制矩形并填充
imagefilledrectangle($image, 0, 0, $width, $height, $white);

// 开始绘制
$size = mt_rand(20, 28);
$angle = mt_rand(-15, 15);
$fontFile = 'fonts/FREESCPT.TTF';
$x = 50;
$y = 30;
$text = mt_rand(1000,9999);

imagettftext($image, $size, $angle, $x, $y, $randColor, $fontFile, $text);

// 告诉浏览器一图像形式显示
header('content-type:image/png');

// 输出图像
imagepng($image);

// 销毁资源
imagedestroy($image);