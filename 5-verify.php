<?php 
$width = 200;
$height = 40;
$image = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, $width, $height, $white);
function getRandColor($image)
{
	return imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
}

// 快速创建字符串
$string = join('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));

// 获得字体宽度
$textWidth = imagefontwidth(28);

// 获得字体高度
$textHeight= imagefontheight(28);

$length = 4;

for ($i=0; $i < $length; $i++) { 
	$randColor = getRandColor($image);
	$size = mt_rand(20,28);
	$angle = mt_rand(-15,15);
	$x = ($width/$length)*$i+$textWidth;
	$y = mt_rand($height/2, $height-$textHeight);
	$fontFile = 'fonts/FREESCPT.TTF';
	$text = str_shuffle($string){0};
	imagettftext($image, $size, $angle, $x, $y, $randColor, $fontFile, $text);
}

// 添加干扰元素 添加像素点
for ($i=0; $i < 50; $i++) { 
	imagesetpixel($image, mt_rand(0,$width), mt_rand(0,$height), getRandColor($image));
}

// 添加线

for ($i=0; $i < 3; $i++) { 
	imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), getRandColor($image));
}

// 绘制圆弧
for ($i=0; $i < 3; $i++) { 
	imagearc($image, mt_rand(0,$width/2), mt_rand(0,$height/2), mt_rand(0,$width/2), mt_rand(0,$height/2), mt_rand(0,360), mt_rand(0,360), getRandColor($image));
}
header('content-type:image/jpeg');
imagejpeg($image);
imagedestroy($image);