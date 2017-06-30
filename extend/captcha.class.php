<?php 

$width = 200;
$height = 50;

$image = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($image, 255, 255, 255);
// $randColor = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagefilledrectangle($image, 0, 0, $width, $height, $white);


$fontFile = '../fonts/FREESCPT.TTF';
// $text = mt_rand(1000,9999);
$string = join('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));
// 获得字体宽度
// $textWidth = imagefontwidth(28);

// 获得字体高度
// $textHeight= imagefontheight(28);
$length = 4;
for ($i=0; $i < $length; $i++) { 
	// $x = 20+($width/$length)*$i;
	// $y = mt_rand(30,50);
	
	$size = mt_rand(30,40);
	// 获得字体宽度
	$textWidth = imagefontwidth($size);

	// 获得字体高度
	$textHeight= imagefontheight($size);

	$x = ($width/$length)*$i+$textWidth;
	$y = mt_rand($height-$textHeight,$height-3);
	$angle = mt_rand(-18,18);
	$text = str_shuffle($string){0};
	// $randColor = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	$randColor = getRandColor($image);
	imagettftext($image, $size, $angle, $x, $y, $randColor, $fontFile, $text);
}
// imagettftext($image, 48, 0, 100, 100, $randColor, $fontFile, $text);
$pielx = 50;
for ($i=0; $i < $pielx; $i++) { 
	imagesetpixel($image, mt_rand(0,$width), mt_rand(0,$height), getRandColor($image));
}
for ($i=0; $i < 3; $i++) { 
	imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), getRandColor($image));
}
header('content-type:image/png');
imagepng($image);
imagedestroy($image);
function getRandColor($image)
{
	return imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
}

/**
* 生产验证码
*/
class CaptCha
{
	private $_image;
	private $_string;

	private $_fontFile = null;
	private $_width;
	private $_height;
	private $_lenght;
	private $_type;
	private $_pielx;
	private $_line;

	function __construct($config)
	{
		isset($config['fontFile'])&&is_file($config['fontFile'])&&is_readable($config['fontFile']):$this->_fontFile = $config['fontFile']?(echo "fontFile is not .";exit;);
		isset($config['width'])&&$config['width']>0:$this->_width = $config['width']?$this->_width = 300;
		isset($config['height'])&&$config['height']>0:$this->_height = $config['height']?$this->_height = 50;
		isset($config['length'])&&$config['length']>0&&$config['length']<10:$this->_lenght = $config['length']?$this->_lenght = 4;
		isset($config['type'])&&$config['type']>0&&$config['type']<=4:$this->_type = $config['type']?$this->_type = 1;
		isset($config['pielx'])&&$config['pielx']>0:$this->_pielx = $config['pielx']?$this->_pielx = null;
		isset($config['line'])&&$config['line']>0:$this->_line = $config['line']?$this->_line = null;

		switch ($this->_type) {
			case 1:
				$this->_string = mt_rand(1000,9999);
				break;
			
			case 2:
				$this->_string = join('',array_merge(range('a', 'z'), range('A', 'Z')));
				break;

			case 3:
				$this->_string = join('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));
				break;
			case 4:
				
				break;

			default:
				
				break;
		}
	}
}