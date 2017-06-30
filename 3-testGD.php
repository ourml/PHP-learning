<?php 
header("content-type:text/html;charset=utf-8");
// 1-testGD

// phpinfo();
// var_dump(extension_loaded('gd'));
// var_dump(function_exists('gd_info()'));
// var_dump(gd_info());
// print_r(get_defined_functions());

// 2-testGD

// $width=500;
// $height=300;
// $image = imagecreatetruecolor($width, $height);

// $red = imagecolorallocate($image, 255, 0, 0);
// $blue = imagecolorallocate($image, 0, 0, 255);
// $white = imagecolorallocate($image, 255, 255, 255);

// imagechar($image, 5, 10, 100, 'c', $red);
// imagecharup($image, 5, 100, 15, 'k', $blue);
// imagestring($image, 5, 200, 110, "Hello world", $white);

// header('content-type:image/jpeg');

// imagejpeg($image);

// imagedestroy($image);

// 3-testGD

// 创建画布
$image = imagecreatetruecolor(500, 500);

// 创建颜色
$white = imagecolorallocate($image, 255, 255, 255);
$randColor = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));

// imagefilledrectangle($image, 0, 0, 500, 500, $white); 绘制填充矩形
imagefilledrectangle($image, 0, 0, 500, 500, $white);

// 绘画

imagefttext($image, 40, 0, 100, 100, $randColor, 'fonts/FREESCPT.TTF', "Hello World");
imagettftext($image, 40, 0, 200, 200, $randColor, 'fonts/FREESCPT.TTF', "Hello World");

// 告诉浏览器以图像形式显示
header('content-type:image/png');

// 输出图像
imagepng($image);

// 保存图像
imagepng($image, 'images/1.png');

// 销毁资源
imagedestroy($image);
